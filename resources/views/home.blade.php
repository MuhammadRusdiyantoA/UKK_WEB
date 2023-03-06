@extends('app')

@section('title')
    Home | LibraryApp
@endsection

@section('content')
    <div class="w-full h-96 flex p-8 flex-col justify-center items-center">
        <h1 class="font-semibold text-5xl mb-4">LibraryApp</h1>
        <p class="text-xl mx-16 text-center">
            Read <span class="font-semibold text-blue-500 uppercase">whatever</span> you like, 
            <span class="font-semibold text-blue-500 uppercase">wherever</span> you like, 
            <span class="font-semibold text-blue-500 uppercase">whenever</span> you like.
        </p>
    </div>
@endsection