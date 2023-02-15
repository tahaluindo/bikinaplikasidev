<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePenyusutansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyusutans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('barang_id');
            $table->integer('bulan_ke')->nullable();
            $table->integer('jumlah')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('penyusutans');
    }
}
