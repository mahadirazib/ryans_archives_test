<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel Blog') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <x-navigation />

    <main class="max-w-6xl mx-auto my-6 px-4">
        @if (session('success'))
            <div id="flash-success" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('flash-success').style.display = 'none';
                }, 2000);
            </script>
        @endif

        @if ($errors->any())
            <div id="flash-error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('flash-error').style.display = 'none';
                }, 2000);
            </script>
        @endif

        @yield('content')
    </main>
</body>
</html> 