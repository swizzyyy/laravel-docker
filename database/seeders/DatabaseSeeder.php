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
        $ranks = [
            ['name' => 'Rank 1'],
            ['name' => 'Rank 2'],
            ['name' => 'Rank 3'],
            ['name' => 'Rank 4'],
            ['name' => 'Rank 5'],
            ['name' => 'Rank 6'],
            ['name' => 'Rank 7'],
            ['name' => 'Rank 8'],
            ['name' => 'Rank 9'],
            ['name' => 'Rank 10'],
            ['name' => 'Rank 11'],
            ['name' => 'Rank 12'],
        ];

        DB::table('ranks')->insert($ranks);
        Redis::set('rank',1);

        \App\Models\Player::factory()->count(10)->create();

        \App\Models\Admin::factory()->create();
    }
}
