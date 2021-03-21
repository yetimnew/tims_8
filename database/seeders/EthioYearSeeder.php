<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\EthioYear;
use Illuminate\Support\Facades\DB;

class EthioYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('ethio_years')->truncate();
        for ($i=1900; $i <=2050 ; $i++) {
            EthioYear::create([
                'number' =>$i,
            ]);
        }
    }
}
