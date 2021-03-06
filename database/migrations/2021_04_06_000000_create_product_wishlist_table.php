<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductWishlistTable extends Migration
{

    /**

    * Run the migrations.

    *

    * @return void

    */

    public function up()
    {

        Schema::create('product_wishlist', function (Blueprint $table) 
        {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('wishlist_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('wishlist_id')->references('id')->on('wishlists');
        });

    }
    /**

    * Reverse the migrations.

    *

    * @return void

    */

    public function down()

    {

    Schema::dropIfExists('product_wishlist');

    }
}
