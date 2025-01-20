@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">Recent Posts</h1>
        <form method="GET" action="{{ route('posts.index') }}" class="flex gap-2">
            <select name="category" class="border rounded px-3">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                        {{ ucfirst($category) }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded transition-all hover:bg-teal-600">
                Filter
            </button>
        </form>
    </div>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach($posts as $post)
            <div class="bg-white rounded shadow-md p-6">
                <h2 class="text-xl font-bold mb-2">
                    <a href="{{ route('posts.show', $post) }}" class="transition-all hover:text-teal-500">
                        {{ $post->title }}
                    </a>
                </h2>
                <p class="text-gray-600 mb-4">{{ Str::limit($post->description, 150) }}</p>
                <div class="flex justify-between items-center text-sm text-gray-500">
                    <span>By {{ $post->user->name }}</span>
                    <span class="bg-gray-200 px-2 py-1 rounded">{{ ucfirst($post->category) }}</span>
                </div>
                <div class="mt-4 text-sm text-gray-500">
                    @php
                        $comments = $post->comments->count();
                    @endphp
                    {{ $comments }} {{ Str::plural('comment', $comments) }}
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</div>
@endsection 