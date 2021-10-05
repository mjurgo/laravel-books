<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        $userRating = 0; 
        foreach ($this->ratings as $rating)
        {
            $userRating += $rating->rating;

        }

        return $this->ratings->count() > 0 ? $userRating / $this->ratings->count() : 0;
    }

    public function currentUserRating()
    {
        foreach ($this->ratings as $rating)
        {
            if ($rating->user_id == Auth::id())
            {
                return $rating;
            }
        }

        return null;
    }

    public function ratedByCurrentUser()
    {
        foreach ($this->ratings as $rating)
        {
            if ($rating->user_id == Auth::id())
            {
                return true;
            }
        }

        return false;
    }
}
