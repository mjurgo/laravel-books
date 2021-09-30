<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Book;

class StaticPageController extends Controller
{
    public function home()
    {
        $recentBooks = Book::with('author')
            ->recent()
            ->get();

        return view('static_pages.home', ['recentBooks' => $recentBooks]);
    }
}
