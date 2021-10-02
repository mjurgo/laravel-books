<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StaticPageController extends Controller
{
    public function home()
    {        
        $ratings = Rating::with('book')->where('user_id', '=', Auth::id())->get();
        
        return view('static_pages.home', [
            'recentBooks' => Book::with('author')->recent()->get(),
            'ratings' => $ratings
        ]);
    }
}
