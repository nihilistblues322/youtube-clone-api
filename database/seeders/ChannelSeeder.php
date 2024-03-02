<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $channels = [];
        foreach (range(1, 10) as $i) {
            $channels[] = [
                'name' => 'Channel ' . $i,
                'user_id' => $i,
            ];

        }
        DB::table('channels')->insert($channels);
    }
}
