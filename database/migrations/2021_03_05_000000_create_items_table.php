<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{

    /**

    * Run the migrations.

    *

    * @return void

    */

    public function up()
    {

        Schema::create('items', function (Blueprint $table) 
        {
            $table->bigIncrements('id');
            $table->integer('quantity');
            $table->float('subtotal');
            $table->unsignedBigInteger('product');
            $table->foreign('product')->references('id')->on('products');
            $table->unsignedBigInteger('order');
            $table->foreign('order')->references('id')->on('orders');
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

    Schema::dropIfExists('items');

    }
}