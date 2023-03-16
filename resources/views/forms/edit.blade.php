@extends('app')

@section('title')
    Edit "{{$book->title}}" | LibraryApp
@endsection

@section('content')
<div class="w-full h-screen py-8 flex justify-center items-center">
    <div class="w-3/4 h-min border border-blue-800">
        <div class="h-1/6 p-3 flex items-center bg-blue-500">
            <a href="/books" class="py-2 px-4 bg-blue-50 ml-2 mr-4 text-blue-500">Back</a>
            <h1 class="text-lg text-blue-50">Edit Book - "{{$book->title}}"</h1>
        </div>
        <form class="flex flex-col p-4" action="/books/{{$book->id}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="m-2 flex flex-col">
                <label class="mb-1" for="title">Title</label>
                <input class="py-2 px-4 outline-none" type="text" name="title" id="title" required value="{{$book->title}}" maxlength="255">
                @error('title')
                    <p class="text-red-600">{{$errors->first('title')}}</p>
                @enderror
            </div>
            <div class="m-2 flex flex-col">
                <label class="mb-1" for="img">Cover</label>
                <input class="py-2 outline-none" type="file" accept="image/*" name="img" id="img">
                @error('img')
                    <p class="text-red-600">{{$errors->first('img')}}</p>
                @enderror
            </div>
            <div class="m-2 flex flex-col">
                <label class="mb-1" for="stock">Stock</label>
                <input class="py-2 px-4 outline-none" type="number" name="stock" id="stock" required value="{{$book->stock}}" min="0" max="2147483647">
                @error('stock')
                    <p class="text-red-600">{{$errors->first('stock')}}</p>
                @enderror
            </div>
            <div class="m-2 flex flex-col">
                <label class="mb-1" for="author">Author</label>
                <input class="py-2 px-4 outline-none" type="text" name="author" id="author" required value="{{$book->author}}" maxlength="255">
                @error('author')
                    <p class="text-red-600">{{$errors->first('author')}}</p>
                @enderror
            </div>
            <div class="m-2 flex flex-col">
                <label class="mb-1" for="publisher">Publisher</label>
                <input class="py-2 px-4 outline-none" type="text" name="publisher" id="publisher" required value="{{$book->publisher}}" maxlength="255">
                @error('publisher')
                    <p class="text-red-600">{{$errors->first('publisher')}}</p>
                @enderror
            </div>
            <div class="m-2 flex flex-col">
                <label class="mb-1" for="blurb">Blurb (Preview of Book's Content)</label>
                <textarea class="py-2 px-4 h-36 outline-none" type="text" name="blurb" id="blurb" required>{{$book->blurb}}</textarea>
                @error('blurb')
                    <p class="text-red-600">{{$errors->first('blurb')}}</p>
                @enderror
            </div>
            <button class="self-start mx-2 mt-2 py-2 px-4 bg-blue-500 text-blue-50" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection