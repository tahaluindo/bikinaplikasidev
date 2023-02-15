<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRiwayatBerobatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_berobats', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('pasien_id');
            $table->string('penyakit_id');
            $table->text('catatan')->nullable();
            $table->date('tanggal_berobat')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('riwayat_berobats');
    }
}
