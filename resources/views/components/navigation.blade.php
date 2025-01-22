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