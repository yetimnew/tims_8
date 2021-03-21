<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\EthioMonth;
use Illuminate\Support\Facades\DB;

class MonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('months')->truncate();
        EthioMonth::create([
            'number' => 1,
            'name' => 'መስከረም',
        ]);
        EthioMonth::create([
            'number' => 2,
            'name' => 'ጥቅምት',
        ]);
        EthioMonth::create([
            'number' => 3,
            'name' => 'ኅዳር',
        ]);
        EthioMonth::create([
            'number' => 4,
            'name' => 'ታኅሣሥ',
        ]);
        EthioMonth::create([
            'number' => 5,
            'name' => 'ጥር',
        ]);
        EthioMonth::create([
            'number' => 6,
            'name' => 'የካቲት',
        ]);
        EthioMonth::create([
            'number' => 7,
            'name' => 'መጋቢት',
        ]);
        EthioMonth::create([
            'number' => 8,
            'name' => 'ሚያዝያ',
        ]);
        EthioMonth::create([
            'number' => 9,
            'name' => 'ግንቦት',
        ]);
        EthioMonth::create([
            'number' => 10,
            'name' => 'ሰኔ',
        ]);
        EthioMonth::create([
            'number' => 11,
            'name' => 'ሐምሌ',
        ]);
        EthioMonth::create([
            'number' => 12,
            'name' => 'ነሐሴ',
        ]);
        EthioMonth::create([
            'number' => 13,
            'name' => 'ጳጉሜ',
        ]);
    }
    }
