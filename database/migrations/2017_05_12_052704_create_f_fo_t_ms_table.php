<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFFoTMsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ffotms', function (Blueprint $table) {
            $table->increments('id')->unsigned();            

            $table->integer('base_id')->unsigned();
            $table->foreign('base_id')->references('id')->on('items');

            $table->integer('strap_id')->unsigned();
            $table->foreign('strap_id')->references('id')->on('items');

            $table->integer('tattoo_id')->unsigned();
            $table->foreign('tattoo_id')->references('id')->on('items');
            
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('items');
                        
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
        Schema::dropIfExists('ffotms');
    }
}
