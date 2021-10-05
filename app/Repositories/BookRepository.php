<?php

namespace App\Repositories;

use App\Interfaces\BookRepository as BookRepositoryInterface;
use App\Models\Book;

class BookRepository implements BookRepositoryInterface
{
    private Book $bookModel;

    public function __construct(Book $bookModel)
    {
        $this->bookModel = $bookModel;
    }

    public function allPaginated($perPage)
    {
        return $this->bookModel->with('author')->paginate($perPage);
    }

    public function get($id)
    {
        return Book::with('ratings')->find($id);
    }
}
