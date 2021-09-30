<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Database\Factories\BookFactory;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->truncate();
        DB::table('book_genre')->truncate();

        $genres = Genre::all();

        Book::factory()->count(1000)->create();

        Book::all()->each(function ($book) use ($genres) {
            $book->genres()->attach($genres->random(1));
        });
    }
}
