<?php

namespace Database\Seeders;

use App\Models\Video;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CategoryVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryIds = Category::pluck('id');
        $videoIds = Video::pluck('id');

        $categoryVideos = $categoryIds->flatMap(
            fn (int $id) => $this->categoryVideos($id, $this->randomVideoIds($videoIds))
        );

        DB::table('category_video')->insert($categoryVideos->all());

    }

    private function categoryVideos(int $categoryId, Collection $videoIds): Collection
    {
        return $videoIds->map(fn (int $id) => [
            'category_id' => $categoryId,
            'video_id' => $id,
        ]);

    }

    private function randomVideoIds(Collection $ids): Collection
    {
        return $ids->random(mt_rand(1, count($ids)));
    }
}
