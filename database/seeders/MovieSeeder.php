<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            ['title' => 'Фільм 1', 'is_published' => true, 'poster_url' => 'default.jpg'],
            ['title' => 'Фільм 2', 'is_published' => false, 'poster_url' => 'default.jpg'],
            ['title' => 'Фільм 3', 'is_published' => true, 'poster_url' => 'default.jpg'],
            ['title' => 'Фільм 4', 'is_published' => true, 'poster_url' => 'default.jpg'],
        ]);
    }
}
