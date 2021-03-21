<?php

use App\Models\Maintenance\JobIdent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobIdentTableSeeder extends Seeder
{

    public function run()
    {
        // DB::table('job_idents')->truncate();
        JobIdent::create([
            'name' => 'Mukera  Indent',
            'job_system_id' => '1',
            'mechanic_hours' => '1.0',
            'ass_mechanic_hours' => '1.0',
        ]);
    }
}
