@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
  
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold">{{ $user->name }}'s Profile</h1>
            <p class="text-gray-600">Member since {{ $user->created_at->format('F Y') }}</p>
        </div>
        @if(Auth::id() === $user->id)
            <a href="#" class="bg-teal-500 text-white px-4 py-2 rounded transition-all hover:bg-teal-600">
                Edit Profile
            </a>
        @endif
    </div>

    <div class="border-t pt-6">
        <h2 class="text-2xl font-bold mb-4">Posts by {{ $user->name }}</h2>
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($posts as $post)
                <x-post-card-preview :post="$post" />
            @empty
                <h1 class="text-2xl font-bold text-gray-400">No posts found</h1>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection 