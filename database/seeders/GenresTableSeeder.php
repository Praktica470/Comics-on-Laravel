<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'genre_name' => 'Триллер'
        ]);

        Genre::create([
            'genre_name' => 'Комедия'
        ]);

        Genre::create([
            'genre_name' => 'Мистика'
        ]);

        Genre::create([
            'genre_name' => 'Драма'
        ]);
    }
}
