<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Rank::factory()->count(12)->create();

        \App\Models\Player::factory()->count(10)->create();

        \App\Models\Admin::factory()->create();

        \App\Models\Prize::factory()->count(5)->create();

        \App\Models\RankCategory::factory()->count(5)->create();
    }
}
