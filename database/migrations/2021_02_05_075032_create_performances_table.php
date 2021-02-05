<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performances', function (Blueprint $table) {
            $table->id();
            $table->boolean('trip')->default(0);
            $table->boolean('load_type');
            $table->string('fo_number');
            $table->unsignedBigInteger('operation_id');
            $table->foreign('operation_id')->references('id')->on('operations')->onDelete('restrict');

            $table->unsignedBigInteger('driver_truck_id');
            $table->foreign('driver_truck_id')->references('id')->on('driver_truck')->onDelete('restrict');

            $table->dateTime('date_dispatch');
            $table->unsignedBigInteger('origin_id');
            $table->foreign('origin_id')->references('id')->on('places')->onDelete('restrict');
            $table->unsignedBigInteger('destination_id');
            $table->foreign('destination_id')->references('id')->on('places')->onDelete('restrict');
            $table->double('distance_without_cargo',12,4);
            $table->double('distance_with_cargo',12,4)->nullable();
            $table->double('tone',12,4)->nullable();
            $table->double('ton_km',20,4)->default(0.00);
            $table->double('fuelIn_litter',12,4)->nullable();
            $table->double('fuelIn_birr',12,4)->nullable();
            $table->double('perdiem',12,4)->nullable();
            $table->double('operational_expense',12,4)->nullable();
            $table->double('other_expense',12,4)->nullable();
            $table->text('comment')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('is_returned')->default(0);
            $table->dateTime('returned_date')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performances');
    }
}
