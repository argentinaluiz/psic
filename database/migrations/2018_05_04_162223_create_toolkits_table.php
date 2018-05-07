<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToolkitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toolkits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('link')->nullable();
            $table->enum('deleted',["N","S"])->default("N");
            $table->integer('order')->default(1);
            $table->integer('tool_id')->unsigned()->default(1);
            $table->integer('document_id')->unsigned()->default(1);

            $table->foreign('tool_id')->references('id')->on('tools');
            $table->foreign('document_id')->references('id')->on('documents');
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
        Schema::dropIfExists('toolkits');
    }
}
