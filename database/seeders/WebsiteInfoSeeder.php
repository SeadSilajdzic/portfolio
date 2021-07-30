<?php

namespace Database\Seeders;

use App\Models\SiteManagement;
use Illuminate\Database\Seeder;

class WebsiteInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteManagement::create([
            'main_title' => 'Sead Silajdzic',
            'role_title' => 'Laravel Developer',
            'birthday' => '1998-02-03 00:00:00',
            'website' => 'seadsilajdzic.com',
            'phone' => '060 31 90 079',
            'city' => 'Kljuc, Bosnia and Herzegovina',
            'age' => '23',
            'education' => 'ITAcademy | PHP Development',
            'mail' => 'silajdzic.dev@gmail.com',
            'status' => 'Freelance Web Developer',
            'aboutme' => 'Lorem ipsum dolor sit amet',
            'service_intro' => 'Some service intro',
            'service1title' => 'service 1',
            'service1desc' => 'service 1',
            'service2title' => 'service 2',
            'service2desc' => 'service 2',
            'service3title' => 'service 3',
            'service3desc' => 'service 3',
            'service4title' => 'service 4',
            'service4desc' => 'service 4',
            'service5title' => 'service 5',
            'service5desc' => 'service 5',
            'service6title' => 'service 6',
            'service6desc' => 'service 6',
            'featured' => '/uploads/defaultimg/SSDev.jpg'
        ]);
    }
}
