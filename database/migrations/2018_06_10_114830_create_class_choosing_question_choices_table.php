<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassChoosingQuestionChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_choosing_question_choices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_choosing_id')->unsigned();
            $table->foreign('class_choosing_id')->references('id')->on('class_choosings');
            $table->integer('question_choice_id')->unsigned();
            $table->foreign('question_choice_id')->references('id')->on('question_choices');
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
        Schema::dropIfExists('class_choosing_question_choices');
    }
}
