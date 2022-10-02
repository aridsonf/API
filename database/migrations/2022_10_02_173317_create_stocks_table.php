<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->biginteger('fk_product')->unsigned();
            $table->foreign('fk_product')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('inbound');
            $table->integer('balance');
            $table->integer('reserved')->nullable();
            $table->date('validate_date');
            $table->double('value', 10, 2);
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
        Schema::dropIfExists('stocks');
    }
}
