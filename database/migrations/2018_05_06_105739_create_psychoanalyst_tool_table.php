<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePsychoanalystToolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psychoanalyst_tool', function (Blueprint $table) {
            $table->integer('tool_id')->unsigned();
            $table->foreign('tool_id')->references('id')->on('tools');

            $table->integer('psychoanalyst_id')->unsigned();
            $table->foreign('psychoanalyst_id')->references('id')->on('psychoanalysts');

            $table->unique(['tool_id','psychoanalyst_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('psychoanalyst_tool');
    }
}
