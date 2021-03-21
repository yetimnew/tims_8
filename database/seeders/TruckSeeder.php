<?php

namespace Database\Seeders;

use App\Models\Operation\Truck;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TruckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('trucks')->truncate();
        Truck::create([
            'plate' => '123456',
            'truck_model_id' => '1',
            'chassis_number' => '123456789',
            'engine_number' => '123456987',
            'tyre_size' => '12',
            'service_Interval_km' => '10000',
            'purchase_price' => '2000000',
            'production_date' => '1980-1-1',
            'service_start_date' => '1980-1-1'
        ]);
    }
}
