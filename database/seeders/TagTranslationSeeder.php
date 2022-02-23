<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;
use Illuminate\Support\Facades\DB;

class TagTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/tag_translations.json");
        $tag_translations = json_decode($json);

        foreach( $tag_translations as $obj ){
            DB::table('tag_translations')->insert([
                'tag_id' => $obj->tag_id,
                'locale' => $obj->locale,
                'value' => $obj->value,
                'created_at' => now(),
            ]);
        }
    }
}
