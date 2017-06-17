<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBestSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('best_sellers', function(Blueprint $table) {
            $table->increments('id')->unsigned();

            $table->integer('base_id')->unsigned();
            $table->foreign('base_id')->references('id')->on('bases');

            $table->integer('strap_id')->unsigned();
            $table->foreign('strap_id')->references('id')->on('straps');

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
        Schema::dropIfExists('best_sellers');
    }
}
