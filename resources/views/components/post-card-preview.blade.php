@props(['post'])

<div class="bg-white rounded shadow-md p-6">
    <h2 class="text-xl font-bold mb-2">
        <a href="{{ route('posts.show', $post) }}" class="hover:text-teal-500 transition-all">
            {{ $post->title }}
        </a>
    </h2>
    <p class="text-gray-600 mb-4">{{ Str::limit($post->description, 150) }}</p>
    <div class="flex justify-between items-center text-sm text-gray-500">
        <span>By {{ $post->user->name }}</span>
        <span class="bg-gray-100 px-2 py-1 rounded">{{ ucfirst($post->category) }}</span>
    </div>
    <div class="mt-4 text-sm text-gray-500">
        {{ $post->comments->count() }} {{ Str::plural('comment', $post->comments->count()) }}
    </div>
</div> 