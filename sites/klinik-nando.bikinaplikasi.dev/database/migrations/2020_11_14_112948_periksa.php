<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Periksa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periksa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dokter_id');
            $table->integer('pasien_id');
            $table->integer('pegawai_id');
            $table->string('gejala');
            $table->string('diagnosa');
            $table->string('obat');
            $table->integer('status_periksa');
            $table->integer('status_pembayaran');
            $table->integer('biaya');
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
        Schema::dropIfExists('periksa');
    }
}
