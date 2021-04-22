<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsPostsSeeder extends Seeder
{
    public function run()
    {
        for($x = 0; $x < 40; $x++){

            DB::table('tags_posts')->insert([
                'tags_id' => random_int(1,8),
                'posts_id' => random_int(1,27)
            ]);
        }
    }
}
