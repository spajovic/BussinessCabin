<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialSeeder extends Seeder
{
    public function run()
    {
        $socials = [
            [
                'i_class'=> 'bx bxl-twitter',
                'name'=> 'Twitter',
                'href'=> 'https://twitter.com/?lang=en'
            ],
            [
                'i_class' => 'bx bxl-facebook',
                'name'=> 'Facebook',
                'href'=> 'https://www.facebook.com/'
            ],
            [
                'i_class' => 'bx bxl-instagram',
                'name'=> 'Instagram',
                'href'=> 'https://www.instagram.com/accounts/login/'
            ],
            [
                'i_class' => 'bx bxl-linkedin',
                'name'=> 'Linkedin',
                'href'=> 'https://www.linkedin.com/'
            ]
        ];
        foreach ($socials as $link)
        DB::table('socials')->insert([
            'i_class' => $link['i_class'],
            'name' => $link['name'],
            'href' => $link['href']
        ]);
    }
}
