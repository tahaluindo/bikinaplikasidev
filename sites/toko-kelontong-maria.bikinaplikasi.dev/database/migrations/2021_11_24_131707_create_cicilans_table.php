<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCicilansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cicilans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('tagihan_id')->nullable();
            $table->integer('jumlah')->nullable();
            $table->integer('cicilan_ke')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cicilans');
    }
}
