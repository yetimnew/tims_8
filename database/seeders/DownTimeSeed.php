<?php

namespace Database\Seeders;

use App\Models\Maintenance\DownTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DownTimeSeed extends Seeder
{

    public function run()
    {
        // DB::table('departments')->truncate();
        DownTime::create([
            'name'=>'(01) Lack of spare parts',
            'comment'=>'(01) Lack of spare parts',
        ]);
        DownTime::create([
            'name'=>'(02) Shortage of labour',
            'comment'=>'(02) Shortage of labour',
        ]);
        DownTime::create([
            'name'=>'(03) Lack of fuel',
            'comment'=>'(03) Lack of fuel',
        ]);
        DownTime::create([
            'name'=>'(04) Bad climatic condition',
            'comment'=>'(04) Bad climatic condition',
        ]);
    }
}
