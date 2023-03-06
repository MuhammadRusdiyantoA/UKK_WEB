@extends('app')

@section('title')
    Homepage | LibraryApp
@endsection

@section('content')
    <div class="m-8">
        <div class="w-full pb-8 flex justify-between border-b border-b-blue-500">
            @if (auth()->user() && auth()->user()->isAdmin)    
                <a href="/books/create" class="bg-blue-400 text-blue-50 py-2 px-4">Add New</a>
            @else
                <div></div>
            @endif
            <form action="/books/search" method="POST">
                @csrf
                <input type="text" name="search" required class="py-2 px-4 outline-none border border-blue-400" value="{{isset($query) ? $query : ''}}">
                <button type="submit" class="bg-blue-400 text-blue-50 py-2 px-4">Search</button>
            </form>
        </div>
        <div class="w-full flex flex-wrap">
            @if ($books->isNotEmpty())
                @if(auth()->user() && auth()->user()->isAdmin)
                    @foreach ($books as $book)
                        <a href="/books/{{$book->id}}" class="w-48 h-min p-5 m-3 shadow-xl flex flex-col items-center flex-wrap">
                            <p class="text-lg mb-2 break-words">{{$book->title}}</p>
                            <img class="w-full h-48 object-cover" src="{{asset('storage/'.$book->image)}}" alt="{{$book->title}}">
                            <div class="w-full mt-2 flex justify-between">
                                <form class="w-full mt-2 flex justify-between" action="/books/{{$book->id}}/edit">
                                    <button type="submit" class="bg-yellow-400 py-2 px-4">Edit</button>
                                </form>
                                <form class="w-full mt-2 flex justify-between" method="POST" action="/books/{{$book->id}}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="bg-red-400 py-2 px-4">Delete</button>
                                </form>
                            </div>
                        </a>
                    @endforeach
                @else
                    @foreach ($books as $book)
                        <a href="/books/{{$book->id}}" class="w-48 h-min p-5 m-3 shadow-xl flex flex-col items-center flex-wrap">
                            <p class="text-lg mb-2 break-words">{{$book->title}}</p>
                            <img class="w-full h-48 object-cover" src="{{asset('storage/'.$book->image)}}" alt="{{$book->title}}">
                        </a>
                    @endforeach
                @endif
            @endif
        </div>
    </div>
@endsection