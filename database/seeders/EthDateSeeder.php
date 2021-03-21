<?php

namespace Database\Seeders;

use App\Models\Admin\EthDate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EthDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('eth_dates')->truncate();
        for ($i=1; $i <=30 ; $i++) {
            EthDate::create([
                'number' =>$i,
            ]);
        }
    }
}
