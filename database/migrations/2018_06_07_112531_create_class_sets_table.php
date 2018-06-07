<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_sets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('research_id')->unsigned();
            $table->foreign('research_id')->references('id')->on('researches');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('psychoanalyst_id')->unsigned();
            $table->foreign('psychoanalyst_id')->references('id')->on('psychoanalysts');
            $table->unique(['research_id','category_id','psychoanalyst_id'],'class_set_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_sets');
    }
}
