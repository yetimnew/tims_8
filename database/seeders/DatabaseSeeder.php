<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'Yetimesht Tadesse',
            'email'=>'yetimnew@gmail.com',
            'mobile'=>'0929102926',
            'password'=>bcrypt('password'),
            'is_active'=> '1',
            'is_admin'=>'1',
        ]);
    }
}
