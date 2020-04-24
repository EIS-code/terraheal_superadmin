<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FreelancerTherapistMassageHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancer_therapist_massage_histories', function (Blueprint $table) {
            $table->id();
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->time('remaining_time')->nullable();
            $table->time('pause_from')->nullable();
            $table->time('pause_to')->nullable();
            $table->bigInteger('booking_infos_id')->unsigned();
            $table->foreign('booking_infos_id')->references('id')->on('booking_infos')->onDelete('cascade');
            // $table->bigInteger('therapist_id')->unsigned();
            // $table->foreign('therapist_id')->references('id')->on('freelancer_therapists')->onDelete('cascade');
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
        Schema::dropIfExists('freelancer_therapist_massage_histories');
    }
}
