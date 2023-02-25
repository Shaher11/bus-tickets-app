<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bus_id')->nullable();
            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('set null');
            $table->foreignId('departure_city_id')->constrained('cities')->onDelete('cascade');          // pickup point 
            $table->foreignId('arrival_city_id')->constrained('cities')->onDelete('cascade');           // destination 
            $table->double('longitude')->nullable();                                                    // To add Departure city from map
            $table->double('latitude')->nullable();                                                     // To add Arrival city from map
            $table->integer('distance');                                                                // 90 KM (short trip) || 150 KM (long trip)
            $table->dateTime('trip_date');                                                              // travel date & time default(add current day)
            $table->dateTime('estimated_arrival_date');                                                 // estimated arrival date & time
            $table->double('fare_amount');                                                              // original ticket amount
            $table->double('total_amount');                                                             // total ticket amount after taxes
            $table->integer('status')->default(1);                                                      // trip differant statuses ex[upcoming, ticketing, in-progress, finished, canceled]
            $table->integer('trip_type');                                                               // short or long  
            $table->integer('is_active')->default(1);                                                   // Soft Delete flag = Zero  
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
        Schema::dropIfExists('trips');
    }
}
