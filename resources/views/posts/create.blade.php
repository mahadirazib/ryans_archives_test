@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Create New Post</h1>
    
    <form method="POST" action="{{ route('posts.store') }}" class="bg-white rounded shadow-md p-6">
        @csrf
        
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
            <input type="text" name="title" id="title" class="w-full px-3 py-2 border rounded" required>
        </div>
        
        <div class="mb-4">
            <label for="category" class="block text-gray-700 font-bold mb-2">Category</label>
            <input type="text" name="category" id="category" class="w-full px-3 py-2 border rounded" required>
        </div>
        
        <div class="mb-6">
            <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
            <textarea name="description" id="description" rows="6" class="w-full px-3 py-2 border rounded" required></textarea>
        </div>
        
        <div class="flex justify-end">
            <button type="submit" class="bg-teal-500 text-white font-bold py-2 px-4 rounded transition-all hover:bg-teal-600">
                Create Post
            </button>
        </div>
    </form>
</div>
@endsection 