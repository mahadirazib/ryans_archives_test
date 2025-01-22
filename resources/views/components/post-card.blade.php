<x-slot:title>
    {{ $post->title }}
</x-slot>

<article class="bg-white rounded shadow-md p-6 mb-6">
    <div class="flex justify-between items-start mb-4">
        <h1 class="text-3xl font-bold">{{ $post->title }}</h1>
        @can('update', $post)
            <div class="flex space-x-2">
                <a href="{{ route('posts.edit', $post) }}" class="bg-teal-500 text-white px-4 py-2 rounded transition-all hover:bg-teal-600">Edit</a>
                <form method="POST" action="{{ route('posts.destroy', $post) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded transition-all hover:bg-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        @endcan
    </div>
    
    <div class="flex items-center text-sm text-gray-500 mb-4">
        <span>By {{ $post->user->name }}</span>
        <span class="mx-2">•</span>
        <span>{{ $post->created_at->diffForHumans() }}</span>
        <span class="mx-2">•</span>
        <span class="bg-gray-100 px-2 py-1 rounded">{{ ucfirst($post->category) }}</span>
    </div>
    
    <p class="text-gray-700 whitespace-pre-line">{{ $post->description }}</p>
</article> 