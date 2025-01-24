<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Mis Tableros</h1>
        <a href="{{ route('boards.create') }}" class="btn btn-primary">Crear Tablero</a>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
            @foreach($boards as $board)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $board->name }}</h5>
                        <a href="{{ route('boards.show', $board) }}" class="btn btn-sm btn-info">Ver Tableros</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>