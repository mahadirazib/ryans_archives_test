@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white rounded shadow-md p-6">
    <h2 class="text-2xl font-bold mb-6">Login</h2>
    
    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="email" name="email" id="email" class="w-full px-3 py-2 border rounded" required>
        </div>
        
        <div class="mb-6">
            <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
            <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded" required>
        </div>
        
        <button type="submit" class="w-full bg-teal-500 text-white font-bold py-2 px-4 rounded transition-all hover:bg-teal-600">
            Login
        </button>
    </form>
    
    <p class="mt-4 text-center">
        Don't have an account? <a href="{{ route('register') }}" class="text-teal-500 transition-all hover:text-teal-600">Register</a>
    </p>
</div>
@endsection 