<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offenders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('offender');
            $table->string('offence_id');
            $table->string('offence');
            $table->string('description');
            $table->string('penalty');
            $table->string('penalty_description');
            $table->string('status')->default("Unresolved");
            
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
        Schema::dropIfExists('offenders');
    }
}
