<?php

namespace Database\Seeders;

use App\Models\HRM\WorkWeek;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkWeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('work_weeks')->truncate();
        WorkWeek::create([
            'mon' => 8,
            'tue' => 8,
            'wed' => 8,
            'thu' => 8,
            'fri' => 8,
            'sat' => 0,
            'sun' => 0,
        ]);
    }
}
