<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('suppliers')) {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('supplierName')->unique();
            $table->string('supplierContact');
            $table->string('address');
            $table->integer('supplierTelephone');
            $table->string('supplierEmail');
            $table->string('supplierStatus');
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
        Schema::dropIfExists('supplier');
    }
}
