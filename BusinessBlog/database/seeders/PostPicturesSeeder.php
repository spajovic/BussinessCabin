<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostPicturesSeeder extends Seeder
{
    public function run()
    {
        for($x = 1; $x <= 27; $x++){
            DB::table('post_pictures')->insert([
                'posts_id' => $x
            ]);
        }
    }
}
