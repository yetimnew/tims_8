<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleAndPermissionTableSeeder extends Seeder
{

    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        Role::create(['name' => 'user']);

        $user =User::first();

        $user->assignRole('user');

        Role::create(['name' => 'admin']);

        /** @var \App\User $user */
        $admin = User::create([
            'name' => 'Yetimesht Tadesse',
            'email' => 'yetimnew@gmail.com',
        ]);

        $admin->assignRole('admin');
            }
}
