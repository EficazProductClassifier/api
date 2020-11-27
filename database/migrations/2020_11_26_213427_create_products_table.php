<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->uuid('id')->primary();
            $table->string('nome')->unique();
            $table->string('descricao');
            $table->float('valor', 8, 2);
            $table->integer('estoque'); 
            $table->uuid('category_id')->nullable(false);

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps(); // data e hora de cadastro
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
