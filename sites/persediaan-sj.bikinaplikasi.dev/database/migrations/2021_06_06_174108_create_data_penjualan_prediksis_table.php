<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDataPenjualanPrediksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_penjualan_prediksis', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('barang_id');
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
        Schema::drop('data_penjualan_prediksis');
    }
}
