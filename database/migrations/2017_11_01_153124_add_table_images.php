<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       if (!Schema::hasTable('images')) {
       Schema::create('images', function (Blueprint $table) {
           $table->increments('id');
           $table->string('name');
           $table->text('productID');
           $table->string('image');

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
         Schema::dropIfExists('images');
     }
}
