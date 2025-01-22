@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <x-post-card :post="$post" />

    <div class="bg-white rounded shadow-md p-6">
        <h2 class="text-2xl font-bold mb-6">Comments</h2>

        @auth
            <x-comment-reply-form :post="$post" />
        @else
            <p class="mb-8 text-gray-600">Please <a href="{{ route('login') }}" class="text-teal-500 transition-all hover:text-teal-600">login</a> to comment.</p>
        @endauth

        <div class="space-y-6">
            @foreach($post->comments->whereNull('parent_id') as $comment)
                <x-comment :comment="$comment" :post="$post" />
            @endforeach
        </div>
    </div>
</div>

<script>
// Helper function to toggle visibility
function toggleVisibility(elementId) {
    const element = document.getElementById(elementId);
    if (element) {
        element.classList.toggle('hidden');
    }
}

function toggleEdit(id) {
    toggleVisibility(`comment-${id}`);
    toggleVisibility(`edit-${id}`);
}

function toggleReply(id) {
    toggleVisibility(`reply-${id}`);
}
</script>
@endsection
