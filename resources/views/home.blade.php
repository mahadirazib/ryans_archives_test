@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold">Blog Posts</h1>
        <form method="GET" action="{{ route('posts.index') }}" class="flex gap-2">
            <select name="category" class="border rounded px-3 py-2">
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
            <x-post-card-preview :post="$post" />
        @endforeach
    </div>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</div>
@endsection 