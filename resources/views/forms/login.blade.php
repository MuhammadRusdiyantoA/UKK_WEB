@extends('app')

@section('title')
    Login to a Account | LibraryApp
@endsection

@section('content')
    <div class="w-full h-screen flex items-center justify-center">
        <form class="w-4/12 p-8 shadow-xl flex flex-col items-start justify-start" action="" method="POST">
            @csrf
            <h1 class="text-2xl mb-2 font-medium">Login</h1>
            <div class="w-full my-2 flex flex-col">
                <label class="mb-1" for="email">Email</label>
                <input class="py-2 px-4 outline-none" type="email" name="email" id="email" required maxlength="255">
            </div>
            <div class="w-full my-2 flex flex-col">
                <label class="mb-1" for="pass">Password</label>
                <input class="py-2 px-4 outline-none" type="password" name="pass" id="pass" required maxlength="255">
            </div>
            @if($errors->any())
                <p class="text-red-600 mb-4">Your email address or password is incorrect!</p>
            @endif
            <button class="w-full self-center mt-2 bg-blue-500 text-blue-50 py-2 px-4" type="submit">Login</button>
            <div class="w-full border-t-2 border-t-blue-400 mt-6 pt-4">
                <p>Don't have an account? <a href="/register" class="text-blue-400 underline">Register</a></p>
            </div>
        </form>
    </div>
@endsection