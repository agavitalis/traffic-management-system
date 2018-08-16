<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('owner');
            $table->string('vehicle')->unique();

            $table->string('vehicle_name');
            $table->string('vehicle_type');
            $table->string('vehicle_color');
            $table->string('vehicle_brand');

            $table->string('engine_number');
            $table->string('chassis_number');
            $table->string('remarks');
            $table->string('registered_by');

           

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
        Schema::dropIfExists('vehicles');
    }
}
