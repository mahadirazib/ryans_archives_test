<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel Blog') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div>
                    <a href="{{ route('posts.index') }}" class="text-xl font-bold">Blog</a>
                </div>
                <div class="flex space-x-4">
                    @guest
                        <a href="{{ route('login') }}" class="text-gray-700 transition-all hover:text-gray-900">Login</a>
                        <a href="{{ route('register') }}" class="text-gray-700 transition-all hover:text-gray-900">Register</a>
                    @else
                        <a href="{{ route('posts.create') }}" class="text-gray-700 transition-all hover:text-gray-900">New Post</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-700 transition-all hover:text-gray-900">Logout</button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto mt-6 px-4">
        @if (session('success'))
            <div id="flash-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('flash-message').style.display = 'none';
                }, 2000);
            </script>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html> 