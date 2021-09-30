<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->truncate();

        $authors = [];
        $faker = Factory::create();

        for ($i = 0; $i < 30; $i++)
        {
            $authors[] = [
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'birthday' => $faker->date(),
                'biography' => $faker->text(500)
            ];
        }

        DB::table('authors')->insert($authors);
    }
}
