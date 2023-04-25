<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// sail artisan db:seed コマンドで１行ずつダミーデータを生成する
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Str;

// Factory を利用してシーディング
use App\Models\Tweet;

class TweetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // sail artisan db:seed コマンドで1行ずつダミーデータを生成する
        // DB::table('tweets')->insert([
        //     'content' => Str::random(100),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // Factory を利用してシーディング
        Tweet::factory()->count(10)->create();
    }
}
