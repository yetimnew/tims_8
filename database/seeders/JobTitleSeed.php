<?php

namespace Database\Seeders;

use App\Models\HRM\JobTitle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobTitleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('jobtitles')->truncate();
        JobTitle::create([
            'name' => 'Driver Grade III',
            'job_description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore unde modi,
            sed magnam praesentium ea natus atque dolor obcaecati, temporibus reiciendis facere voluptatibus nam?
             Praesentium officiis et sunt voluptate veniam.',
             'department_id'=>1,
            'status' => 1,
        ]);
        JobTitle::create([
            'name' => 'Mechanic',
            'job_description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore unde modi,
            sed magnam praesentium ea natus atque dolor obcaecati, temporibus reiciendis facere voluptatibus nam?
             Praesentium officiis et sunt voluptate veniam.',
             'department_id'=>1,
            'status' => 1,

        ]);
        JobTitle::create([
            'name' => 'IT',
            'job_description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore unde modi,
            sed magnam praesentium ea natus atque dolor obcaecati, temporibus reiciendis facere voluptatibus nam?
             Praesentium officiis et sunt voluptate veniam.',
             'department_id'=>1,
            'status' => 1,
        ]);
        JobTitle::create([
            'name' => 'HR',
            'job_description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore unde modi,
            sed magnam praesentium ea natus atque dolor obcaecati, temporibus reiciendis facere voluptatibus nam?
             Praesentium officiis et sunt voluptate veniam.',
             'department_id'=>1,
            'status' => 1,
        ]);
    }
}
