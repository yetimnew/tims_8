<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Maintenance\Workshop;

class WorkShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('workshops')->truncate();
        Workshop::create([
            'name' => 'Addis Abeba',
            'comment' => 'Addis Abeba',
        ]);
        Workshop::create([
            'name' => 'Nazareth',
            'comment' => 'Nazareth',
        ]);
    }
}
