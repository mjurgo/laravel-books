<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->simplePaginate();
        
        return view('books.index', ['books' => $books]);
    }

    public function show(int $id)
    {
        $book = Book::find($id);
        
        return view('books.show', ['book' => $book]);
    }

    public function create()
    {
        $authors = Author::all();
        $genres = Genre::all();

        return view('books.create', [
            'authors' => $authors, 'genres' => $genres
        ]);
    }

    public function store(BookRequest $request)
    {
        $book = new Book();

        $book->title = $request->input('title');
        $book->author_id = $request->input('author');
        $book->length = $request->input('length');
        $book->description = $request->input('description');
        
        // Sprawdzić, czy da się to dołączyć przed zapisaniem
        $book->save();
        $book->genres()->attach($request->input('genres'));

        return redirect(route('books.show', $book->id))
            ->with('message', 'Książka dodana.');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        $authors = Author::all();
        $genres = Genre::all();
        
        return view('books.edit', [
            'book' => $book, 'authors' => $authors, 'genres' => $genres
        ]);
    }

    public function update(BookRequest $request, $id)
    {
        $book = Book::find($id);

        $book->title = $request->input('title');
        $book->author_id = $request->input('author');
        $book->length = $request->input('length');
        $book->description = $request->input('description');

        $book->save();
        $book->genres()->sync($request->input('genres'));

        return redirect(route('books.show', $book))
            ->with('message', 'Książka zaktualizowana.');
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect(route('books.index'))->with('message', 'Książka usunięta.');
    }
}
