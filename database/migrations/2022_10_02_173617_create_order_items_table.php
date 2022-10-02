<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->biginteger('fk_order')->unsigned();
            $table->foreign('fk_order')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->biginteger('fk_stock')->unsigned();
            $table->foreign('fk_stock')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('product_quantity');
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
        Schema::dropIfExists('order_items');
    }
}
