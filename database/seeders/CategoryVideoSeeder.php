<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CategoryVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoriesIds = Category::pluck('id')->all();
        $videosIds = Video::pluck('id')->all();

        $categoryVideo = [];

        foreach ($categoriesIds as $categoryId) {
            $randomVideosIds = Arr::random($videosIds, mt_rand(1, count($videosIds)));

            foreach ($randomVideosIds as $videoId) {
                $categoryVideo[] = [
                    'category_id' => $categoryId,
                    'video_id' => $videoId,
                ];
            }
        }

        DB::table('category_video')->insert($categoryVideo);

    }
}
