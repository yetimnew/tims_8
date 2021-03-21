<?php

namespace Database\Seeders;

use App\Models\Operation\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // DB::table('customers')->truncate();
        Customer::create(
            [
                'name' => 'ERTE',
                'address' => 'Addis abeba',
                'office_number' => '123456789',
                'mobile' => '123456789'
            ]
        );
    }
}
