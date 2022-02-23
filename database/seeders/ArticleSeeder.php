<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for( $i = 1; $i <= 12; $i++ ){
            DB::table('articles')->insert([
                'image' => 'article-' . $i . '.png',
                'created_at' => now(),
            ]);
        }
    }
}
