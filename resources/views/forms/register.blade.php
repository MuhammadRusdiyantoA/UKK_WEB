@extends('app')

@section('title')
    Register a New Account | LibraryApp
@endsection

@section('content')
    <div class="w-full h-screen flex items-center justify-center">
        <form class="w-4/12 p-8 shadow-xl flex flex-col items-start justify-start" action="" method="POST" autocomplete="off">
            @csrf
            <h1 class="text-2xl mb-4 font-medium">Register</h1>
            <div class="w-full my-2 flex flex-col">
                <label class="mb-1" for="username">Username</label>
                <input class="py-2 px-4 outline-none" type="text" name="username" id="username" required maxlength="255">
                @error('username')
                    <p class="text-red-600">{{$errors->first('username')}}</p>
                @enderror
            </div>
            <div class="w-full my-2 flex flex-col">
                <label class="mb-1" for="username">Email</label>
                <input class="py-2 px-4 outline-none" type="text" name="email" id="email" required maxlength="255">
                @error('email')
                    <p class="text-red-600">{{$errors->first('email')}}</p>
                @enderror
            </div>
            <div class="w-full my-2 flex flex-col">
                <label class="mb-1" for="pass">Password</label>
                <input class="py-2 px-4 outline-none" type="password" name="pass" id="pass" required maxlength="255">
                @error('pass')
                    <p class="text-red-600">{{$errors->first('pass')}}</p>
                @enderror
            </div>
            <div class="w-full my-2 flex flex-col">
                <label class="mb-1" for="pass">Confirm Password</label>
                <input class="py-2 px-4 outline-none" type="password" name="confirm" id="confirm" required maxlength="255">
                @error('confirm')
                    <p class="text-red-600">{{$errors->first('confirm')}}</p>
                @enderror
            </div>
            <button class="w-full self-center mt-2 bg-blue-500 text-blue-50 py-2 px-4" type="submit">Create Account!</button>
            <div class="w-full border-t-2 border-t-blue-400 mt-6 pt-4">
                <p>Have an account? <a href="/login" class="text-blue-400 underline">Login</a></p>
            </div>
        </form>
    </div>
@endsection