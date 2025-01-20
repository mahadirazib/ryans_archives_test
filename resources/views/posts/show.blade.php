@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
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

    <div class="bg-white rounded shadow-md p-6">
        <h2 class="text-2xl font-bold mb-6">Comments</h2>
        
        @auth
            <form method="POST" action="{{ route('comments.store', $post) }}" class="mb-8">
                @csrf
                <div class="mb-4">
                    <textarea name="content" rows="3" class="w-full px-3 py-2 border rounded" placeholder="Write a comment..." required></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded transition-all hover:bg-teal-600">
                        Post Comment
                    </button>
                </div>
            </form>
        @else
            <p class="mb-8 text-gray-600">Please <a href="{{ route('login') }}" class="text-teal-500 transition-all hover:text-teal-600">login</a> to comment.</p>
        @endauth

        <div class="space-y-6">
            @foreach($post->comments->whereNull('parent_id') as $comment)
                <div class="border-b pb-6 last:border-b-0">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <span class="font-bold">{{ $comment->user->name }}</span>
                            <span class="text-gray-500 text-sm ml-2">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="flex space-x-2">
                            @can('update', $comment)
                                <button onclick="toggleEdit({{ $comment->id }})" class="text-teal-500 transition-all hover:text-teal-600">Edit</button>
                            @endcan
                            @can('delete', $comment)
                                <form method="POST" action="{{ route('comments.destroy', $comment) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 transition-all hover:text-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            @endcan
                        </div>
                    </div>

                    <div id="comment-{{ $comment->id }}" class="mb-2">
                        <p class="text-gray-700">{{ $comment->content }}</p>
                    </div>

                    <div id="edit-{{ $comment->id }}" class="hidden mb-2">
                        <form method="POST" action="{{ route('comments.update', $comment) }}">
                            @csrf
                            @method('PUT')
                            <textarea name="content" rows="2" class="w-full px-3 py-2 border rounded mb-2" required>{{ $comment->content }}</textarea>
                            <div class="flex justify-end space-x-2">
                                <button type="button" onclick="toggleEdit({{ $comment->id }})" class="text-gray-500 transition-all hover:text-gray-600">Cancel</button>
                                <button type="submit" class="text-teal-500 transition-all hover:text-teal-600">Update</button>
                            </div>
                        </form>
                    </div>

                    @auth
                        <button onclick="toggleReply({{ $comment->id }})" class="text-teal-500 transition-all hover:text-teal-600 text-sm">Reply</button>
                        <div id="reply-{{ $comment->id }}" class="hidden mt-2">
                            <form method="POST" action="{{ route('comments.store', $post) }}">
                                @csrf
                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                <textarea name="content" rows="2" class="w-full px-3 py-2 border rounded mb-2" placeholder="Write a reply..." required></textarea>
                                <div class="flex justify-end space-x-2">
                                    <button type="button" onclick="toggleReply({{ $comment->id }})" class="text-gray-500 transition-all hover:text-gray-600">Cancel</button>
                                    <button type="submit" class="text-teal-500 transition-all hover:text-teal-600">Reply</button>
                                </div>
                            </form>
                        </div>
                    @endauth

                    <!-- Replies -->
                    @if($comment->replies->count() > 0)
                        <div class="ml-8 mt-4 space-y-4">
                            @foreach($comment->replies as $reply)
                                <div class="border-l-2 border-gray-200 pl-4">
                                    <div class="flex justify-between items-start mb-2">
                                        <div>
                                            <span class="font-bold">{{ $reply->user->name }}</span>
                                            <span class="text-gray-500 text-sm ml-2">{{ $reply->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="flex space-x-2">
                                            @can('update', $reply)
                                                <button onclick="toggleEdit({{ $reply->id }})" class="text-teal-500 transition-all hover:text-teal-600">Edit</button>
                                            @endcan
                                            @can('delete', $reply)
                                                <form method="POST" action="{{ route('comments.destroy', $reply) }}" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 transition-all hover:text-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            @endcan
                                        </div>
                                    </div>

                                    <div id="comment-{{ $reply->id }}" class="mb-2">
                                        <p class="text-gray-700">{{ $reply->content }}</p>
                                    </div>

                                    <div id="edit-{{ $reply->id }}" class="hidden mb-2">
                                        <form method="POST" action="{{ route('comments.update', $reply) }}">
                                            @csrf
                                            @method('PUT')
                                            <textarea name="content" rows="2" class="w-full px-3 py-2 border rounded mb-2" required>{{ $reply->content }}</textarea>
                                            <div class="flex justify-end space-x-2">
                                                <button type="button" onclick="toggleEdit({{ $reply->id }})" class="text-gray-500 transition-all hover:text-gray-600">Cancel</button>
                                                <button type="submit" class="text-teal-500 transition-all hover:text-teal-600">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
function toggleEdit(id) {
    const commentDiv = document.getElementById(`comment-${id}`);
    const editDiv = document.getElementById(`edit-${id}`);
    commentDiv.classList.toggle('hidden');
    editDiv.classList.toggle('hidden');
}

function toggleReply(id) {
    const replyDiv = document.getElementById(`reply-${id}`);
    replyDiv.classList.toggle('hidden');
}
</script>
@endsection 