<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpenJobCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('open_job_cards', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('job_card_type_id')->index();
            $table->foreignId('job_card_type_id')->nullable()->constrained();
            $table->string('Job_card_number')->uniqid();
            $table->dateTime('opening_date');
            $table->foreignId('workshop_id')->nullable()->constrained();
            $table->foreignId('truck_id')->nullable()->constrained();
            $table->foreignId('customer_id')->nullable()->constrained();
            $table->json('job_system_id');
            $table->json('job_ident_id');

            $table->double('km_reading', 6, 2)->default(0.00);
            $table->dateTime('km_reading_date')->nullable();

            $table->bigInteger('driver_id')->nullable();
            $table->bigInteger('mechanic_id')->nullable();
            $table->bigInteger('ass_mechanic_id')->nullable();
            $table->bigInteger('opening_clerk_id')->nullable();
            $table->bigInteger('receptionist_id')->nullable();
            $table->boolean('closed')->default(0);
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('open_job_cards');
    }
}
