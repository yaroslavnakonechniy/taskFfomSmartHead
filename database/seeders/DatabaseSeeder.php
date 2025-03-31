<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;
use App\Models\Movie;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $genres = Genre::factory()->count(15)->create();
        $movies = Movie::factory()->count(50)->create();

        foreach ($movies as $movie) {
            $randomGenres = $genres->random(rand(1, 3));
            $movie->genres()->attach($randomGenres);
        }
    }
}
