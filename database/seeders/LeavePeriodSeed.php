<?php

namespace Database\Seeders;

use App\Models\HRM\LeavePeriod;
use Illuminate\Database\Seeder;

class LeavePeriodSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LeavePeriod::create([
            'name' => '2012 Budget Year',
            'start_date' => '2011-11-1',
            'end_date' => '2012-11-30',
        ]);
        LeavePeriod::create([
            'name' => '2013 Budget Year',
            'start_date' => '2012-11-1',
            'end_date' => '2013-11-30',
        ]);
    }
}
