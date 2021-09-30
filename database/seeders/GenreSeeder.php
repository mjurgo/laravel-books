<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->truncate();

        $genres = [
            ['name' => 'fantasy'],
            ['name' => 'horror'],
            ['name' => 'science fiction'],
            ['name' => 'romans'],
            ['name' => 'thriller'],
            ['name' => 'biografia'],
            ['name' => 'psychologia'],
            ['name' => 'historia'],
            ['name' => 'podróże'],
            ['name' => 'sztuka'],
            ['name' => 'muzyka'],
            ['name' => 'programowanie'],
            ['name' => 'informatyka'],
            ['name' => 'komiks']
        ];

        DB::table('genres')->insert($genres);
    }
}
