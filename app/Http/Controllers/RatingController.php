<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $rating = new Rating();

        $rating->rating = $request->input('rating');
        $rating->book_id = $request->input('book_id');
        $rating->user_id = Auth::user()->id;

        $rating->save();

        return redirect(route('books.show', $request->input('book_id')));
    }

    public function update(Request $request, $id)
    {
        $rating = Rating::find($id);
        $rating->rating = $request->input('rating');
        $rating->save();

        return redirect(route('books.show', $rating->book_id));
    }
}
