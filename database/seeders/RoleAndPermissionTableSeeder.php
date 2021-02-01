<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleAndPermissionTableSeeder extends Seeder
{

    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        Role::create(['name' => 'user']);

        $user = Factory(\App\User::class)->create();

        $user->assignRole('user');

        Role::create(['name' => 'admin']);

        /** @var \App\User $user */
        $admin = factory(\App\User::class)->create([
            'name' => 'Yetimesht Tadesse',
            'email' => 'yetimnew@gmail.com',
        ]);

        $admin->assignRole('admin');
            }
}
