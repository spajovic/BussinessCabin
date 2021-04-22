<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersPicturesSeeder extends Seeder
{

    public function run()
    {
        for($x = 7; $x <= 10; $x++){
            DB::table('user_pictures')->insert([
                'user_pictures_id'=>$x
            ]);
        }
    }
}
