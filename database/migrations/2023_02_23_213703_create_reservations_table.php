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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');           // Can't be null
            $table->foreignId('trip_id')->constrained()->onDelete('cascade');          //  Can't be null
            $table->unsignedBigInteger('bus_seat_id')->nullable();
            $table->foreign('bus_seat_id')->references('id')->on('bus_seat')->onDelete('set null');                         
            $table->integer('is_active')->default(1);                                  // Soft Delete flag = Zero  
            $table->unique(['trip_id', 'bus_seat_id']);
            $table->timestamps();                                                       //date_of_booking
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
