<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenresToComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        App\Models\GenresToComics::create([
            'comics_id' => 1,
            'genre_id' => 1
        ]);

        App\Models\GenresToComics::create([
            'comics_id' => 2,
            'genre_id' => 2
        ]);
    }
}
