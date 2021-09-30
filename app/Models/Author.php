<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function name()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
