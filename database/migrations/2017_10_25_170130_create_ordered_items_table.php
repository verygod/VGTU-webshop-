<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderedItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('orderProducts')) {
        Schema::create('orderProducts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('orderedName');
            $table->string('orderedPrice');
            $table->string('orderedQuantity');
            $table->string('orderedID');
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
        Schema::dropIfExists('orderProducts');
    }
}
