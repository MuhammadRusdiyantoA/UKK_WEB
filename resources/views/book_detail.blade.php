@extends('app')

@section('title')
    {{$book->title}} | LibraryApp
@endsection

@section('content')
    <div class="w-full p-8">
        <div class="flex justify-start items-start pb-8 mb-8 border-b-2 border-b-slate-300">
            <img class="w-64 h-96 box-content object-cover pr-8 mr-8 border-r-2 border-r-slate-300" src="{{asset('storage/'.$book->image)}}" alt="">
            <table>
                <tbody>
                    <tr>
                        <td>Title</td>
                        <td>: {{$book->title}}</td>
                    </tr>
                    <tr>
                        <td>Author</td>
                        <td>: {{$book->author}}</td>
                    </tr>
                    <tr>
                        <td class="pr-4">Publisher</td>
                        <td>: {{$book->publisher}}</td>
                    </tr>
                    <tr>
                        <td>Stock</td>
                        <td>: {{$book->stock}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection