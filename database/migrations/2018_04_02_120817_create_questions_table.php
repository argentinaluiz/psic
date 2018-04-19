<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('question');
            $table->float('point');
            $table->text('observation')->nullable();
            $table->integer('class_test_id')->unsigned();
            $table->foreign('class_test_id')->references('id')->on('class_tests');
            $table->nullableMorphs('questionable');//cria dois campos (questionable_id e questionable_type)
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
        Schema::dropIfExists('questions');
    }
}
