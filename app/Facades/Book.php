<?php

namespace App\Facades;

use App\Repositories\BookRepository;
use Illuminate\Support\Facades\Facade;

class Book extends Facade
{
    protected static function getFacadeAccessor()
    {
        return BookRepository::class;
    }
}
