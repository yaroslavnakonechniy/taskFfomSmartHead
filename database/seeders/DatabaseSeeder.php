<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\GenreSeeder;
use Database\Seeders\MoviesSeeder;
use Database\Seeders\MovieGenreSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GenreSeeder::class);
        $this->call(MovieSeeder::class);
        $this->call(MovieGenreSeeder::class);
    }
}
