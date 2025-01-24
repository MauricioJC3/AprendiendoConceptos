<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">{{ $board->name }}</h1>
            
            <div class="flex space-x-2">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCardModal">
                    Agregar nueva carta
                </button>
                
                <form action="{{ route('boards.update', $board) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" name="is_active" value="{{ $board->is_active ? '0' : '1' }}" 
                            class="btn {{ $board->is_active ? 'btn-warning' : 'btn-success' }}">
                        {{ $board->is_active ? 'Deactivate' : 'Activate' }}
                    </button>
                </form>
                
                <form action="{{ route('boards.destroy', $board) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar tablero</button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
            @php $statuses = ['todo', 'in_progress', 'done'] @endphp
            
            @foreach($statuses as $status)
                <div class="bg-gray-100 p-4 rounded">
                    <h2 class="text-lg font-semibold capitalize mb-4">{{ str_replace('_', ' ', $status) }}</h2>

                    @foreach($board->cards()->where('status', $status)->get() as $card)
                        <div class="card mb-2 {{ 
                            $card->priority === 'high' ? 'border-red-500' : 
                            ($card->priority === 'medium' ? 'border-yellow-500' : 'border-green-500') 
                        }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $card->title }}</h5>
                                <p>{{ $card->description }}</p>
                                <div class="text-sm text-gray-600">
                                    <strong>Priority:</strong> {{ ucfirst($card->priority) }}<br>
                                    <strong>Start:</strong> {{ $card->start_date->format('Y-m-d') }}<br>
                                    @if($card->end_date)
                                        <strong>End:</strong> {{ $card->end_date->format('Y-m-d') }}
                                    @endif
                                </div>
                                
                                <div class="flex space-x-2 mt-2">
                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editCardModal{{ $card->id }}">
                                        Edit
                                    </button>
                                    
                                    <form action="{{ route('cards.destroy', $card) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        <!-- Create Card Modal -->
        <div class="modal fade" id="createCardModal" tabindex="-1" aria-labelledby="createCardModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createCardModalLabel">Crear una nueva carta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('cards.store', $board) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <input type="text" name="title" placeholder="Card Title" class="form-control mb-2" required>
                            <textarea name="description" placeholder="Description" class="form-control mb-2"></textarea>
                            
                            <select name="status" class="form-control mb-2">
                                <option value="todo">Por hacer</option>
                                <option value="in_progress">En progreso</option>
                                <option value="done">Completo</option>
                            </select>

                            <select name="priority" class="form-control mb-2">
                                <option value="low">Preoridad Baja</option>
                                <option value="medium" selected>Preoridad Media</option>
                                <option value="high">Preoridad Alta</option>
                            </select>
                            
                            <label>Fecha de inicio</label>
                            <input type="date" name="start_date" value="{{ now()->format('Y-m-d') }}" class="form-control mb-2">
                            
                            <label>Fecha de Finalizacion</label>
                            <input type="date" name="end_date" class="form-control mb-2">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Crear tarjeta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Card Modals -->
        @foreach($board->cards as $card)
            <div class="modal fade" id="editCardModal{{ $card->id }}" tabindex="-1" aria-labelledby="editCardModalLabel{{ $card->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editCardModalLabel{{ $card->id }}">Edit Card</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('cards.update', $card) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <input type="text" name="title" value="{{ $card->title }}" class="form-control mb-2" required>
                                
                                <textarea name="description" class="form-control mb-2">{{ $card->description }}</textarea>
                                
                                <select name="status" class="form-control mb-2">
                                    <option value="todo" {{ $card->status == 'todo' ? 'selected' : '' }}>Por hacer</option>
                                    <option value="in_progress" {{ $card->status == 'in_progress' ? 'selected' : '' }}>En progreso</option>
                                    <option value="done" {{ $card->status == 'done' ? 'selected' : '' }}>Completo</option>
                                </select>

                                <select name="priority" class="form-control mb-2">
                                    <option value="low" {{ $card->priority == 'low' ? 'selected' : '' }}>Preoridad Baja</option>
                                    <option value="medium" {{ $card->priority == 'medium' ? 'selected' : '' }}>Preoridad Media</option>
                                    <option value="high" {{ $card->priority == 'high' ? 'selected' : '' }}>Preoridad Alta</option>
                                </select>
                                
                                <label>Fecha de Inicio</label>
                                <input type="date" name="start_date" value="{{ $card->start_date ? $card->start_date->format('Y-m-d') : now()->format('Y-m-d') }}" class="form-control mb-2">
                                
                                <label>Fecha de Finalizacion</label>
                                <input type="date" name="end_date" value="{{ $card->end_date ? $card->end_date->format('Y-m-d') : '' }}" class="form-control mb-2">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Include Bootstrap CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</x-app-layout>