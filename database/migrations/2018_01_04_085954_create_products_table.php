<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('slug')->nullable();
            $table->string('image', 200)->nullable();
            $table->string('details')->nullable();
            $table->decimal('old_price',10,2);
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('active')->default(true); //s ou n
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
        Schema::dropIfExists('products');
    }
}
