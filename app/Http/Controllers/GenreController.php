<?php

namespace App\Http\Controllers;

use App\Models\Genre;

class GenreController extends Controller
{
    public function show($id)
    {
        $genre = Genre::find($id);

        return view('genres.show', ['genre' => $genre]);
    }
}
