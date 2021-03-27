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
                'hireddate' => '2020-8-8',
                'driver' => 1,
                'penssionid'=>'123456',
                'tin_no'=>'123456',
                'zone'=>'12',
                'woreda'=>'12',
                'city'=>'Addis Abeba',
                'sub_city'=>'Nfas Silklafto',
                'kebele'=>'02',
                'housenumber'=>'123',
                'mobile'=>'0911111111',
                'home_telephone'=>'0911111111',
                'work_telephone'=>'0911111111',
                'email'=>'test@test.com',
                'department_id'=>'1',
                'jobtitle_id'=>'1',
                'pay_grade_id'=>'1',
                'pay_grade_level_id'=>'1',
                'employment_status'=>'1',
                'marital_status'=>'Single',
                'image'=>'',
                'status'=>'1',
                'comment'=>'Dummy Data'
        ]);

    }
}
