<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDataPemesananAktualDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pemesanan_aktual_details', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('detail_pemesanan_aktual_id');
            $table->string('volume_januari')->nullable();
            $table->string('volume_februari')->nullable();
            $table->string('volume_maret')->nullable();
            $table->string('volume_april')->nullable();
            $table->string('volume_mei')->nullable();
            $table->string('volume_juni')->nullable();
            $table->string('volume_juli')->nullable();
            $table->string('volume_agustus')->nullable();
            $table->string('volume_september')->nullable();
            $table->string('volume_oktober')->nullable();
            $table->string('volume_november')->nullable();
            $table->string('volume_desember')->nullable();
            $table->string('harga_per_kg_januari')->nullable();
            $table->string('harga_per_kg_februari')->nullable();
            $table->string('harga_per_kg_maret')->nullable();
            $table->string('harga_per_kg_april')->nullable();
            $table->string('harga_per_kg_mei')->nullable();
            $table->string('harga_per_kg_juni')->nullable();
            $table->string('harga_per_kg_juli')->nullable();
            $table->string('harga_per_kg_juli')->nullable();
            $table->string('harga_per_kg_agustus')->nullable();
            $table->string('harga_per_kg_september')->nullable();
            $table->string('harga_per_kg_desember')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('data_pemesanan_aktual_details');
    }
}
