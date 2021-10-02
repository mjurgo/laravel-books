<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'author', 'description', 'length', 'genres'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function scopeRecent($query)
    {
        return $query->with('genres')->orderByDesc('created_at')->limit(5);
    }

    public function score()
    {
        // Tworzy dodatkowe zapytania do bazy, do optymalizacji.

        $userRating = 0; 
        foreach ($this->ratings()->get() as $rating)
        {
            $userRating += $rating->rating;
        }
        return $userRating / $this->ratings()->count();
    }
}
