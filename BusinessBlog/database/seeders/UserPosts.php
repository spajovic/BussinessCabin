<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserPosts extends Seeder
{

    public function run()
    {
        for($x = 1; $x <= 27; $x ++){
            DB::table('user_posts')->insert([
                'users_id' => 7,
                'posts_id' => $x
            ]);
        }
    }
}
