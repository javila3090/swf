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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',80);
            $table->bigInteger('phone_number');
            $table->integer('id_frecuency')->unsigned();
            $table->foreign('id_frecuency')->references('id')->on('frecuency');
            $table->integer('id_quantity')->unsigned();
            $table->foreign('id_quantity')->references('id')->on('quantity');
            $table->integer('id_status')->unsigned();
            $table->foreign('id_status')->references('id')->on('status');
            $table->integer('id_country')->unsigned();
            $table->foreign('id_country')->references('id')->on('phone_codes');
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
        //
    }
}