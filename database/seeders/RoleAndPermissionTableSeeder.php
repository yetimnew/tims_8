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
         $admin= User::where('id',1)->first();
        $admin->assignRole('admin');
            }
}
