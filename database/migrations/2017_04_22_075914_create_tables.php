<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code');
            $table->integer('discount');
            $table->date('start_date');
            $table->date('expired_date');
        });
        
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('color');
            $table->string('size');
            $table->integer('price');
            $table->string('type');
            $table->integer('stock');
            $table->string('picture');
            
        });

        Schema::create('ffotms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('base_id')->unsigned();
            $table->foreign('base_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('strap_id')->unsigned();            
            $table->foreign('strap_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('tattoo_id')->unsigned();            
            $table->foreign('tattoo_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('coupons_id')->unsigned();            
            $table->foreign('coupons_id')->references('id')->on('coupons')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('total');            
            $table->timestamp('timestamp');
        });

        Schema::create('transaction_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('base_id')->unsigned();
            $table->foreign('base_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('strap_id')->unsigned();            
            $table->foreign('strap_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('tattoo_id')->unsigned();            
            $table->foreign('tattoo_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('transactions_id')->unsigned();        
            $table->foreign('transactions_id')->references('id')->on('transactions')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('quantity');
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
