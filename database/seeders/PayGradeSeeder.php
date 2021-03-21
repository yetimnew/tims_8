<?php

namespace Database\Seeders;

use App\Models\HRM\PayGrade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PayGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('pay_grades')->truncate();
        PayGrade::create([
            'name' => 'ደረጃ 10',
            'comment' => 'ደረጃ 10'
                 ]);
        PayGrade::create([
            'name' => 'ደረጃ 11',
            'comment' => 'ደረጃ 11'
                 ]);
        PayGrade::create([
            'name' => 'ደረጃ 12',
            'comment' => 'ደረጃ 12'
                 ]);
    }
}
