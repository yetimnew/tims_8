<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('origin_id')->index();
            $table->foreign('origin_id')->references('id')->on('places')->onDelete('restrict');

            $table->unsignedBigInteger('destination_id')->index();
            $table->foreign('destination_id')->references('id')->on('places')->onDelete('restrict');

            $table->double('km',10,2);
            $table->tinyInteger('status');
            // $table->unsignedBigInteger('created_by');
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('updated_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            // $table->foreignId('updated_by')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('distances');
    }
}
