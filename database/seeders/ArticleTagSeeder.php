<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;
use Illuminate\Support\Facades\DB;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/article_tag.json");
        $article_tags = json_decode($json);

        foreach( $article_tags as $obj ){
            DB::table('article_tag')->insert([
                'article_id' => $obj->article_id,
                'tag_id' => $obj->tag_id,
                'created_at' => now(),
            ]);
        }
    }
}
