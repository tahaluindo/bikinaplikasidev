<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePesananDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan_details', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('pesanan_id');
            $table->string('paket_id');
            $table->integer('jumlah')->nullable();
            $table->integer('harga')->nullable();
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
        Schema::drop('pesanan_details');
    }
}
