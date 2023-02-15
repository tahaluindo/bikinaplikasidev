<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDataPemesananAktualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pemesanan_aktuals', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('produk_id');
            $table->string('tahun_id');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('data_pemesanan_aktuals');
    }
}
