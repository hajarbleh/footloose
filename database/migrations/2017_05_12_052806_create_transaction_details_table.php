<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('transaction_code');

            $table->integer('base_id')->unsigned();
            $table->foreign('base_id')->references('id')->on('items');

            $table->integer('strap_id')->unsigned();
            $table->foreign('strap_id')->references('id')->on('items');

            $table->integer('tattoo_id')->unsigned();
            $table->foreign('tattoo_id')->references('id')->on('items');

            $table->integer('transaction_id')->unsigned();
            $table->foreign('transaction_id')->references('id')->on('transactions');

            $table->integer('quantity');

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
        Schema::dropIfExists('transaction_details');
    }
}
