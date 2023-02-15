<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pelanggan_id')->unsigned();
            $table->integer('kavling_id')->unsigned();
            $table->integer('lama_angsuran')->nullable();
            $table->date('batas_pembayaran')->nullable();
            $table->integer('dp')->nullable();
            $table->integer('biaya_ppjb')->nullable();
            $table->integer('biaya_shm')->nullable();
            $table->enum('cara_pembayaran', ['Lunas', 'Angsuran']);
            $table->text('catatan')->nullable();
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
        Schema::drop('penjualans');
    }
}
