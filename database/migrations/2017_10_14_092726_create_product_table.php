<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('products')) {
      Schema::create('products', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->unique();
          $table->integer('price');
          $table->integer('oldprice');
          $table->integer('quantity');
          $table->text('description');
          $table->string('imageURL');
          $table->integer('categoryID');
          $table->integer('supplierID');
          $table->integer('status');

          $table->timestamps();
      });
    }
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
