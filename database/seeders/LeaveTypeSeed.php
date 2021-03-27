<?php

namespace Database\Seeders;

use App\Models\HRM\LeaveType;
use Illuminate\Database\Seeder;

class LeaveTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LeaveType::create([
            'name' => 'Annual Leave',
            'status' => '1',
        ]);
        LeaveType::create([
            'name' => 'Educationl  Leave',
            'status' => '1',
        ]);
    }
}
