<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassOptingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_optings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_choice_id')->unsigned();
            $table->foreign('type_choice_id')->references('id')->on('type_choices');
            $table->integer('question_choice_id')->unsigned();
            $table->foreign('question_choice_id')->references('id')->on('question_choices');
            $table->unique(['question_choice_id','type_choice_id'],'class_opting_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_optings');
    }
}
