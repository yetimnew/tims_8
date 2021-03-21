<?php

namespace Database\Seeders;

use App\Models\HRM\Personale;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('personales')->truncate();
        Personale::create([
            'driverid' => '123 ',
            'firstname' => 'Zelalem',
            'fathername' => 'Sibhat',
            'gfathername' => 'ayatu',
            'sex' => 1,
            'birthdate' => '1980-8-8',
            'driver' => 1,
            'department_id' => 1,
            'position_id' => 1,
            'status' => 1,


        ]);
    }
}
