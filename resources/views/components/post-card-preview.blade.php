@props(['post'])

<div class="hover:scale-105 origin-center transition-all">
    <div class="bg-white rounded shadow-md p-6">
        <h2 class="text-xl font-bold mb-2">
            @php
                $title = Str::limit($post->title, 50);
                $colors = ['text-teal-500', 'text-lime-500', 'text-sky-500', 'text-purple-500', 'text-pink-500', 'text-green-500', 'text-blue-500'];
                $randomColor = $colors[array_rand($colors)];
            @endphp
            <a href="{{ route('posts.show', $post) }}" class="hover:{{ $randomColor }} transition-all">
                {{ $title }}
            </a>
        </h2>
        <p class="text-gray-600 mb-4">{{ Str::limit($post->description, 150) }}</p>
        <div class="flex justify-between items-center text-sm text-gray-500">
            <span>By <a href="{{ route('profile.show', $post->user) }}" class="text-gray-700 hover:{{ $randomColor }} transition-all">{{ $post->user->name }}</a></span>
            <span class="bg-gray-100 px-2 py-1 rounded">{{ ucfirst($post->category) }}</span>
        </div>
        <div class="mt-4 text-sm text-gray-500">
            {{ $post->comments->count() }} {{ Str::plural('comment', $post->comments->count()) }}
        </div>
    </div> 
</div>