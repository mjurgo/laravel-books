<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        return view('authors.index', ['authors' => $authors]);
    }

    public function show($id)
    {
        $author = Author::find($id);

        return view('authors.show', ['author' => $author]);
    }
}
