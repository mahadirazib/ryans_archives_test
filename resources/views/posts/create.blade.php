@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Create New Post</h1>
    <x-post-form :action="route('posts.store')" />
</div>
@endsection 