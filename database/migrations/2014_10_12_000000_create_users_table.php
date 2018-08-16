<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('other_names')->nullable();
            $table->string('next_of_kin');
            $table->string('mother_m_name');
            $table->string('username')->unique();
            $table->string('user_type');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('birthday');
            $table->string('password');
            $table->string('res_address');
            $table->string('home_address');
            $table->string('lga');
            $table->string('state');
            $table->string('picture')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
