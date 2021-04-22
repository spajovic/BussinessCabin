<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $names = ['IT','Freelance','Wholesale','Education','Industry','Architecture'];

        foreach ($names as $name)
        DB::table('categories')->insert([
            'name' => $name,
        ]);
    }
}
