<?php

namespace App\Http\Controllers;

use App\Exports\BooksExport;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return view('books_index', ['nav' => true, 'books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'string|max:255',
            'img' => 'image|file',
            'stock' => 'numeric',
            'author' => 'string|max:255',
            'publisher' => 'string|max:255',
            'blurb' => 'string'
        ]);

        $imgPath = $request->file('img')->store('book_cover');

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'image' => $imgPath,
            'stock' => $request->stock,
            'blurb' => $request->blurb
        ]);

        return redirect('/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book_detail', ['nav' => true,'book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('forms.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'string|max:255',
            'author' => 'string|max:255',
            'publisher' => 'string|max:255',
            'blurb' => 'string'
        ]);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->blurb = $request->blurb;
        $book->save();

        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        Storage::delete($book->image);
        $book->delete();

        return redirect('/books');
    }

    /*
        Performs book search by title, author, and publisher
    */
    public function search(Request $request)
    {
        $query = $request->search;
        $books = Book::where('title', 'like', '%'.$query.'%')->orWhere('author', 'like', '%'.$query.'%')->orWhere('publisher', 'like', '%'.$query.'%')->orWhere('blurb', 'like', '%'.$query.'%')->get();

        return view('books_index', ['nav' => true, 'books' => $books, 'query' => $query]);
    }

    /*
        Exports the content of books table into an excel file 
    */
    public function export()
    {
        return Excel::download(new BooksExport, 'Books Report at '.now().'.xlsx');
    }
}
