<?php

namespace Database\Seeders;

use  TruckTableSeeder;
use  JobTypeTableSeeder;
use  CustomerTableSeeder;
use  WorkshopTableSeeder;
use  JobSystemTableSeeder;
use  PositionsTableSeeder;
use  DepartmentTableSeeder;
use  JobCardTypeTableSeeder;
use  VehecleTypeTableSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\WorkWeekSeeder;
use Database\Seeders\PayGradeTableSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(UserTableSeeder::class);
        $this->call(DownTimeSeed::class);
        $this->call(EthDateSeeder::class);
        $this->call(EthioYearSeeder::class);
        $this->call(MonthSeeder::class);

        $this->call(WorkWeekSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(WorkShopSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(VehecleTypeSeeder::class);
        $this->call(JobTitleSeed::class);
        $this->call(JobSystemSeeder::class);
        $this->call(TruckSeeder::class);
        $this->call(JobCardTypeSeeder::class);
        $this->call(JobTypeSeeder::class);
        $this->call(PayGradeSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        // $this->call(PersonaleSeeder::class);

}
}
