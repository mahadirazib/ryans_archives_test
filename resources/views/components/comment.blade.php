@props(['comment', 'post'])

<div class="{{ !$comment->parent_id ? 'border-b pb-6 last:border-b-0' : 'border-l-2 border-gray-200 pl-4' }}">
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
        <x-comment-edit-form :comment="$comment" />
    </div>

    @auth
        @if(!$comment->parent_id)
            <button onclick="toggleReply({{ $comment->id }})" class="text-teal-500 transition-all hover:text-teal-600 text-sm">Reply</button>
            <div id="reply-{{ $comment->id }}" class="hidden">
                <x-comment-reply-form :post="$post" :parentId="$comment->id" />
            </div>
        @endif
    @endauth

    @if($comment->replies->count() > 0 && !$comment->parent_id)
        <div class="ml-8 mt-4 space-y-4">
            @foreach($comment->replies as $reply)
                <x-comment :comment="$reply" :post="$post" />
            @endforeach
        </div>
    @endif
</div>
