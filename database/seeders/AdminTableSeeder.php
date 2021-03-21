<?php

use App\Admin\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'name' => 'Yetimesht Tadesse',
            'type' => 'admin',
            'email' => 'yetimnew@gmail.com',
            'mobile' => '0929102926',
            'password' => bcrypt('pass'),
            'active' => 1,
        ]);
    }
}
