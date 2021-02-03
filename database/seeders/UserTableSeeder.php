<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
        $user = User::create([
            'name'=>'Other User',
            'email'=>'yetim@gmail.com',
            'mobile'=>'0911000000',
            'password'=>bcrypt('password'),
            'is_active'=> '1',
            'is_admin'=>'1',
        ]);
    //     $user->assignRole('admin');
    //     $permissions = Permission::all();

    //    if ($permissions->count() > 0) {

    //        foreach ($permissions as $permission) {
    //        $user->givePermissionTo($permission); //Assigning role to user
    //        }
    //    }
    }
    }

