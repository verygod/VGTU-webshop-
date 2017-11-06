<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('orders')) {
      Schema::create('orders', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('customerid');
        $table->string('shipping');
        $table->integer('totalprice');
        $table->string('shippingAddress');
        $table->string('shippingCity');
        $table->string('shippingPostcode');
        $table->string('shippingEmail');
        $table->integer('shippingTelephone');
        $table->string('status');
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
        Schema::dropIfExists('orders');
    }
}
