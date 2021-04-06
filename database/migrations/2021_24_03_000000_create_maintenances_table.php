<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenancesTable extends Migration
{

    /**

    * Run the migrations.

    *

    * @return void

    */

    public function up()
    {

        Schema::create('maintenances', function (Blueprint $table) 
        {
            $table->bigIncrements('id');
            $table->string('status')->default('In Process');
            $table->double('price');
            $table->text('description');
            $table->unsignedBigInteger('user');
            $table->foreign('user')->references('id')->on('users');
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