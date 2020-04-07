<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->integer('id_customer')->unsigned();
            $table->foreign('id_customer')->references('id')->on('customers')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('id_item')->unsigned();
            $table->foreign('id_item')->references('id')->on('items')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('amount');
            $table->string('price');
            $table->string('date');
            $table->integer('status');
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
        Schema::dropIfExists('orders');
    }
}
