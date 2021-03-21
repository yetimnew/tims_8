<?php

namespace Database\Seeders;

use App\Models\HRM\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('branches')->truncate();
        Branch::create(
            [
                'name' => 'Addis Abeba',
                'city' => 'Addis abeba',
                'address' => 'Addis abeba',
                'phone' => '123456789',
                'fax' => '123456789'
            ]
        );
    }
}
