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
            $table->Increments('id');
            $table->string('productName')->nullable();
            $table->string('productDetail')->nullable();
            $table->float('price')->default(0);
            $table->integer('quantity')->default(0);
            $table->string('color')->nullable();
            $table->string('type')->nullable();
            $table->string('image')->nullable();
            $table->int('createdBy')->default(0);
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
