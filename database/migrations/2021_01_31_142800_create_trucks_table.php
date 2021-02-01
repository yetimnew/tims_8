<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->id();
            $table->string('plate')->unique()->index();
            $table->foreignId('truck_model_id')->constrained()->index();
            $table->string('chassis_number')->nullable();
            $table->string('engine_number')->nullable();
            $table->integer('tyre_size')->nullable();
            $table->double('service_Interval_km',12,4)->nullable();
            $table->double('purchase_price',12,4)->nullable();
            $table->date('production_date')->nullable();
            $table->date('service_start_date')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('trucks');
    }
}
