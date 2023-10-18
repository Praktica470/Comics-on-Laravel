<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        App\Models\Comics::factory()->create([
            'genre_name' => 'Триллер'
        ]);

        App\Models\Comics::factory()->create([
            'genre_name' => 'Комедия'
        ]);

        App\Models\Comics::factory()->create([
            'genre_name' => 'Мистика'
        ]);

        App\Models\Comics::factory()->create([
            'genre_name' => 'Драма'
        ]);
    }
}
