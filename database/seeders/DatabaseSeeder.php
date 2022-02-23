<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Run seeder classes to fill the database with data
        $this->call([
            TagSeeder::class,
            ArticleSeeder::class,
            ArticleTagSeeder::class,
            TagTranslationSeeder::class,
            ArticleTranslationSeeder::class,
        ]);
    }
}
