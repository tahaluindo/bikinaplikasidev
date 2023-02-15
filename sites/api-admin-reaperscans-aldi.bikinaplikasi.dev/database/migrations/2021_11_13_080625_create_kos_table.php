<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('pemilik')->nullable();
            $table->text('alamat_lengkap')->nullable();
            $table->text('alamat_gmaps')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('jumlah_kamar')->nullable();
            $table->string('fasilitas')->nullable();
            $table->string('gambar')->nullable();
            $table->string('kategori');
            $table->integer('harga_terendah')->nullable();
            $table->integer('harga_tertinggi')->nullable();
            $table->integer('harga_sewa_tahunan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kos');
    }
}
