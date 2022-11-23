<?php

namespace Database\Seeders;

use App\Models\Aboutme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $about = Aboutme::create(
            [
                'name' => 'Abanoub Ayad',
                'email' => 'abanob.ayad.2015@gmail.com',
                'image' => 'default.jpg',
                'freelance' => 'Available',
                'JobTitle' => 'Backend Developer',
                'exp' => 'Fresh Graduated',
                'desc' => 'Abanoub Ayad Portfolio',
                'phone' => '01284902397',
                'date_of_birth' =>now(),
                'address' => '11 st Abu Heraira - Moharm Bek - Alexandria',
                'degree' => 'Fresh Graduated',



            ]
        );
    }
}
