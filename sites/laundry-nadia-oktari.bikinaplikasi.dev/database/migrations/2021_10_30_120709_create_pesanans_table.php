<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('pelanggan_id');
            $table->dateTime('dipesan_pada')->nullable();
            $table->dateTime('diambil_pada')->nullable();
            $table->string('status');
            $table->integer('denda')->nullable();
            $table->integer('diskon')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pesanans');
    }
}
