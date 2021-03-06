<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BookingInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_info', function (Blueprint $table) {
            $table->id();
            $table->enum('preference', ['m', 'f'])->comment('m: Male, f: Female');
            $table->string('location');
            $table->date('massage_date');
            $table->dateTime('massage_time');
            $table->integer('massage_duration');
            $table->string('notes_of_injuries');
            $table->enum('is_cancelled', [0, 1])->comment('0: Nope, 1: Yes');
            $table->string('cancelled_reason');
            $table->enum('imc_type', [1, 2])->comment('1: ASAP, 2: Scheduled');
            $table->bigInteger('therapist_id')->unsigned();
            $table->foreign('therapist_id')->references('id')->on('bookings')->onDelete('cascade');
            $table->bigInteger('massage_price_id')->unsigned();
            $table->foreign('massage_price_id')->references('id')->on('massage_pricing')->onDelete('cascade');
            $table->bigInteger('shop_id')->unsigned();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
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
        Schema::dropIfExists('booking_info');
    }
}
