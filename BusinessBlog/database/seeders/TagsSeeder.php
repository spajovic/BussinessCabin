<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsSeeder extends Seeder
{
    public function run()
    {
        $names = ['It','Tips','Marketing','Office','News','Smart','App','Crypto'];

        foreach ($names as $name)
            DB::table('tags')->insert([
                'name' => $name,
            ]);
    }
}
