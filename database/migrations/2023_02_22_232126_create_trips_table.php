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
            $table->foreignId('depature_city_id')->constrained('cities')->onDelete('cascade');  // pickup point 
            $table->foreignId('arrival_city_id')->constrained('cities')->onDelete('cascade');  // destinations 
            $table->integer('distance'); //  90 KM (short trip) || 150 KM (long trip)
            $table->integer('is_active')->default(1);
            $table->unique(['depature_city_id', 'arrival_city_id']);
            // [
            //     'column_1' => 'required|unique:TableName,column_1,' . $this->id . ',id,colum_2,' . $this->column_2
            // ]
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
