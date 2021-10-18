<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use App\Http\Requests\BookRequest;
use Symfony\Component\HttpFoundation\Request;
use App\Interfaces\BookRepository as BookRepository;

class BookController extends Controller
{
    private BookRepository $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function index(Request $request)
    {
        $search = $request->get('search');

        $resultPaginator = $this->bookRepository->filterBy($search, 15);
        $resultPaginator->appends([
            'search' => $search
        ]);

        return view('books.index', [
            // 'books' => $this->bookRepository->allPaginated(15)
            'books' => $resultPaginator,
            'search' => $search
        ]);
    }

    public function show(int $id)
    {
        return view('books.show', [
            'book' => $this->bookRepository->get($id)]
        );
    }

    public function create()
    {
        return view('books.create', [
            'authors' => Author::all(),
            'genres' => Genre::all()
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
        return view('books.edit', [
            'book' => $this->bookRepository->get($id),
            'authors' => Author::all(),
            'genres' => Genre::all()
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
        $book = $this->bookRepository->get($id);
        $book->delete();

        return redirect(route('books.index'))->with('message', 'Książka usunięta.');
    }
}
