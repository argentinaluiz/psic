<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassToolkitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_toolkits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tool_id')->unsigned();
            $table->foreign('tool_id')->references('id')->on('tools');
            $table->integer('sub_rank_id')->unsigned();
            $table->foreign('sub_rank_id')->references('id')->on('sub_ranks');
            $table->integer('psychoanalyst_id')->unsigned();
            $table->foreign('psychoanalyst_id')->references('id')->on('psychoanalysts');
           // $table->unique(['tool_id','rank_id','sub_rank_id'],'class_toolkit_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_toolkits');
    }
}
