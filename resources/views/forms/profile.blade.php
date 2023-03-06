@extends('app')

@section('title')
    {{auth()->user()->name}}' Profile | LibraryApp
@endsection

@section('content')
    <div class="w-full h-full p-8">
        <form class="flex" action="" method="post" enctype="multipart/form-data">
            @csrf    
            <div class="w-1/2 mr-8 pr-8 flex flex-col">
                <div class="m-2 flex flex-col">
                    <label class="mb-1" for="username">Username</label>
                    <input class="py-2 px-4 outline-none" type="text" name="username" id="username" required maxlength="255" value="{{auth()->user()->name}}">
                </div>
                <div class="m-2 flex flex-col">
                    <label class="mb-1" for="password">Password</label>
                    <input class="py-2 px-4 outline-none" type="password" name="password" id="password" maxlength="255">
                </div>
                <div class="m-2 flex flex-col">
                    <label class="mb-1" for="confirm">Confirm</label>
                    <input class="py-2 px-4 outline-none" type="password" name="confirm" id="confirm" maxlength="255">
                </div>
            </div>    
            <div class="w-1/2 flex flex-col justify-between pl-16 border-l-2 border-l-slate-300">
                <div class="m-2 flex flex-col">
                    <label class="mb-1" for="profile">Profile Picture</label>
                    <img class="w-64 h-64 object-cover" src="{{auth()->user()->profile ? asset('storage/'.auth()->user()->profile) : asset('assets/dummy_profile.png')}}" alt="{{auth()->user()->name}}'s Profile Picture">
                    <input class="py-2 outline-none" type="file" name="profile" id="profile" required accept="image/*">
                </div>
                <button class="self-end mx-2 mt-2 py-2 px-4 bg-blue-500 text-blue-50" type="submit">Submit</button>
            </div>
        </form>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="self-start mx-2 mt-2 py-2 px-4 bg-red-500 text-blue-50">Logout</button>
        </form>
    </div>
@endsection