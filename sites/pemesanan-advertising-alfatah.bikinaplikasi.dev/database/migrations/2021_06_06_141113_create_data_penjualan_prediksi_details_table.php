<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDataPemesananPrediksiDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pemesanan_prediksi_details', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('detail_pemesanan_prediksi_id');
            $table->integer('volume_januari')->nullable();
            $table->integer('volume_februari')->nullable();
            $table->integer('volume_maret')->nullable();
            $table->integer('volume_april')->nullable();
            $table->integer('volume_mei')->nullable();
            $table->integer('volume_juni')->nullable();
            $table->integer('volume_juli')->nullable();
            $table->integer('volume_agustus')->nullable();
            $table->integer('volume_september')->nullable();
            $table->integer('volume_oktober')->nullable();
            $table->integer('volume_november')->nullable();
            $table->integer('volume_desember')->nullable();
            $table->integer('harga_per_kg_januari')->nullable();
            $table->integer('harga_per_kg_februari')->nullable();
            $table->integer('harga_per_kg_maret')->nullable();
            $table->integer('harga_per_kg_april')->nullable();
            $table->integer('harga_per_kg_mei')->nullable();
            $table->integer('harga_per_kg_juni')->nullable();
            $table->integer('harga_per_kg_juli')->nullable();
            $table->integer('harga_per_kg_juli')->nullable();
            $table->integer('harga_per_kg_agustus')->nullable();
            $table->integer('harga_per_kg_september')->nullable();
            $table->integer('harga_per_kg_desember')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('data_pemesanan_prediksi_details');
    }
}
