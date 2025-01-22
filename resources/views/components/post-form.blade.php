@props(['post' => null, 'action', 'method' => 'POST'])

<form method="POST" action="{{ route('posts.store') }}" class="bg-white rounded shadow-md p-6">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif
    
    <div class="mb-4">
        <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
        <input type="text" 
               name="title" 
               id="title" 
               value="{{ old('title', $post?->title) }}" 
               class="w-full px-3 py-2 border rounded" 
               required>
    </div>
    
    <div class="mb-4">
        <label for="category" class="block text-gray-700 font-bold mb-2">Category</label>
        <input type="text" 
               name="category" 
               id="category" 
               value="{{ old('category', $post?->category) }}" 
               class="w-full px-3 py-2 border rounded" 
               required>
    </div>
    
    <div class="mb-6">
        <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
        <textarea name="description" 
                  id="description" 
                  rows="6" 
                  class="w-full px-3 py-2 border rounded" 
                  required>{{ old('description', $post?->description) }}</textarea>
    </div>
    
    <div class="flex justify-end space-x-4">
        @if($post)
            <a href="{{ route('posts.show', $post) }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded transition-all hover:bg-gray-600">
                Cancel
            </a>
        @endif
        <button type="submit" class="bg-teal-500 text-white font-bold py-2 px-4 rounded transition-all hover:bg-teal-600">
            {{ $post ? 'Update Post' : 'Create Post' }}
        </button>
    </div>
</form> 