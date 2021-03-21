<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Maintenance\JobType;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('job_types')->truncate();
        JobType::create([
            'name' => 'Service',
            'comment' => 'Service',

        ]);
        JobType::create([
            'name' => 'Repair',
            'comment' => 'Repair',

        ]);
        JobType::create([
            'name' => 'Tyre Change',
            'comment' => 'Tyre Change',

        ]);
    }
}
