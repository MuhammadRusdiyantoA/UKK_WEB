@extends('app')

@section('title')
    Add New Book | LibraryApp
@endsection

@section('content')
<div class="w-full h-screen py-8 flex justify-center items-center">
    <div class="w-3/4 h-min border border-blue-800">
        <div class="h-1/6 p-3 flex items-center bg-blue-500">
            <a href="/books" class="py-2 px-4 bg-blue-50 ml-2 mr-4 text-blue-500">Back</a>
            <h1 class="text-lg text-blue-50">Add New Book</h1>
        </div>
        <form class="flex flex-col p-4" action="/books" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="m-2 flex flex-col">
                <label class="mb-1" for="title">Title</label>
                <input class="py-2 px-4 outline-none" type="text" name="title" id="title" required>
            </div>
            <div class="m-2 flex flex-col">
                <label class="mb-1" for="img">Cover</label>
                <input class="py-2 outline-none" type="file" accept="image/*" name="img" id="img" required>
            </div>
            <div class="m-2 flex flex-col">
                <label class="mb-1" for="stock">Stock</label>
                <input class="py-2 px-4 outline-none" type="number" name="stock" id="stock" required>
            </div>
            <div class="m-2 flex flex-col">
                <label class="mb-1" for="author">Author</label>
                <input class="py-2 px-4 outline-none" type="text" name="author" id="author" required>
            </div>
            <div class="m-2 flex flex-col">
                <label class="mb-1" for="publisher">Publisher</label>
                <input class="py-2 px-4 outline-none" type="text" name="publisher" id="publisher" required>
            </div>
            <div class="m-2 flex flex-col">
                <label class="mb-1" for="blurb">Blurb (Preview of Book's Content)</label>
                <textarea class="py-2 px-4 h-36 outline-none" type="text" name="blurb" id="blurb" required></textarea>
            </div>
            <button class="self-start mx-2 mt-2 py-2 px-4 bg-blue-500 text-blue-50" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection