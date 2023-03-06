<nav class="flex justify-between items-center px-8 bg-blue-500 h-16 shadow-xl">
    <h1 class="text-blue-50 text-xl font-bold">LibraryApp</h1>
    <div class="flex items-center">
        <a class="text-blue-50" href="/">Home</a>
        <a class="text-blue-50 ml-6" href="/books">Books</a>
        @auth
            {{-- <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="text-blue-50 py-2 px-4 ml-2" class="font-medium">Welcome back, {{auth()->user()->name}}!</button>
            </form> --}}
            <a class="text-blue-50 ml-6 flex items-center" href="/profile">
                {{auth()->user()->name}}
                <img class="w-8 h-8 object-cover rounded-full ml-2" src="{{auth()->user()->profile ? asset('storage/'.auth()->user()->profile) : asset('assets/dummy_profile.png')}}" alt="{{auth()->user()->name}}'s Profile Picture">
            </a>
        @else
            <a class="text-blue-500 bg-blue-50 ml-6 py-2 px-4" href="/login">Login</a>
        @endauth
    </div>
</nav>