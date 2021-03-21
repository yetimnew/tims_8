<?php

namespace Database\Seeders;

use App\Models\HRM\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('departments')->truncate();
        Department::create([
            'name' => 'HRM',
            'comment' => 'HRM',
            'status' => 1,
        ]);
        Department::create([
            'name' => 'Maintenace',
            'comment' => 'Maintenace',
            'status' => 1,

        ]);
    }
}
