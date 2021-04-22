<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{

    public function run()
    {
        $faker = Factory::create();
        for ($x = 0; $x <= 25; $x++) {
            DB::table('posts')->insert([
                'heading' => $faker->name,
                'main_text' => $faker->text,
                'category_id'=>random_int(1,6),
                'created_at'=>$faker->dateTime
            ]);
        }
    }
}
