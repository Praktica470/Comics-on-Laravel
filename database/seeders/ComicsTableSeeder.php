<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comics;
use Carbon\Carbon;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comics::create([
            'comics_title' => 'Kaiji: Gambling Apocalypse, vol. 1',
            'comics_description' => 'сэйнэн-манга об азартных играх, написанная и проиллюстрированная Нобуюки Фукумото',
            'comics_cover_image_path' => './image\/Kaiji_manga.jpg',
            'user_id' => 2,
            'published_at' => Carbon::now()
        ]);

        Comics::create([
            'comics_title' => 'Smokey Stover',
            'comics_description' => 'американский комикс, написанный и нарисованный карикатуристом Биллом Холманом',
            'comics_cover_image_path' => './image\/Smokey_stover.jpg',
            'user_id' => 1,
            'published_at' => Carbon::now()
        ]);
    }
}
