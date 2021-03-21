<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Operation\TruckModel;

class VehecleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('truck_models')->truncate();
        TruckModel::create([
            'name' => 'Trucker',
            'company' => 'Trucker',
            'production_date' => '2010-01-01',
            'comment' => 'no commnet'
        ]);
        TruckModel::create([
            'name' => 'Renoalt',
            'company' => 'Renoalt',
            'production_date' => '2010-01-01',
            'comment' => 'no commnet'
        ]);
        TruckModel::create([
            'name' => 'Old',
            'company' => 'Old',
            'production_date' => '2010-01-01',
            'comment' => 'no commnet'
        ]);
    }
}
