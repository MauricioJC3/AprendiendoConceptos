{{-- resources/views/boards/create.blade.php --}}
<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Create New Board</h1>
        
        <form action="{{ route('boards.store') }}" method="POST" class="max-w-md">
            @csrf
            
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                    Board Name
                </label>
                <input type="text" 
                       name="name" 
                       id="name" 
                       required 
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       placeholder="Enter board name">
                
                @error('name')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex items-center justify-between">
                <button type="submit" class="btn btn-primary">
                    Create Board
                </button>
                <a href="{{ route('boards.index') }}" class="btn btn-secondary">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>