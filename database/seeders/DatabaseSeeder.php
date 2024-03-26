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
        \App\Models\Admin::factory()->create();

        \App\Models\Prize::factory()->count(5)->create();

        \App\Models\RankCategory::factory()->count(5)->create();

        \App\Models\Rank::factory()->count(12)->create();

        \App\Models\Player::create([
            'username' => 'test1',
            'first_name' => 'test',
            'last_name' => 'person',
            'gender' =>'male',
            'lang' => 'en',
            'email' => 'testPlayer@gmail.com',
            'rank_id' => 3,
            'password' => bcrypt('password'),
            'last_spin_time' => null,
            'balance' => '0.0000',
            'is_blocked' => '0',
        ]);

        \App\Models\Player::factory()->count(9)->create();

        \App\Models\Setting::create(['cooldown_hour' => 24]);

    }
}
