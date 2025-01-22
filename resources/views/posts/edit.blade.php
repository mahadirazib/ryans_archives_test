@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Edit Post</h1>
    <x-post-form 
        :post="$post" 
        :action="route('posts.update', $post)" 
        method="PUT" 
    />
</div>
@endsection 