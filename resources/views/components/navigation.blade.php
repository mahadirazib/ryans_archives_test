<nav class="bg-white shadow-lg">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <div>
                <a href="{{ route('posts.index') }}" class="text-xl font-bold">Blog</a>
            </div>
            <div class="flex space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="text-gray-700 transition-all hover:text-gray-900 bg-teal-500 text-white font-normal hover:font-bold px-4 py-2 rounded">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-700 transition-all hover:text-gray-900 bg-lime-500 text-white font-normal hover:font-bold px-4 py-2 rounded">Register</a>
                @else
                    <a href="{{ route('posts.create') }}" class="text-gray-700 transition-all bg-teal-500 text-white font-normal hover:font-bold px-4 py-2 rounded">New Post</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-700 transition-all bg-rose-500 text-white font-normal hover:font-bold px-4 py-2 rounded">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </div>
</nav> 