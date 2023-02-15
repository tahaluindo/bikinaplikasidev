<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePenjualanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan_details', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('penjualan_id');
            $table->string('produk_id');
            $table->integer('harga')->nullable();
            $table->integer('jumlah')->nullable();
            $table->integer('total')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('penjualan_details');
    }
}
