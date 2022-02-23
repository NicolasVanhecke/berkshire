<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [ 'inspiratie', 'producten', 'in de kijker', 'promoties' ];

        foreach( $tags as $tag ){
            DB::table('tags')->insert([
                // 'name' => $tag,
                'created_at' => now(),
            ]);
        }
    }
}
