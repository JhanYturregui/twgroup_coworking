<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_coworking')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->enum('state', [config('constants.RESERVATION_STATE_PENDING'), 
                                    config('constants.RESERVATION_STATE_ACCEPTED'), 
                                    config('constants.RESERVATION_STATE_REJECTED')])
                                ->default(config('constants.RESERVATION_STATE_PENDING'));
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_coworking')->references('id')->on('coworkings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
