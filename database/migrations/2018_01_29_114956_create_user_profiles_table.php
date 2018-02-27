<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->string('cep', 10);
            $table->string('number');
            $table->string('complement')->nullable();
            $table->string('city');
          //  $table->integer('city_id')->unsigned();
            $table->string('neighborhood');
            $table->string('state', 2);
            $table->integer('user_id')->unsigned();
            
            $table->foreign('user_id')->references('id')->on('users');
          //  $table->foreign('city_id')->references('id')->on('cities');
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
        Schema::dropIfExists('user_profiles');
    }
}
