<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('anggota_id')->index('anggota_id');
            $table->unsignedBigInteger('user_petugas_id')->index('user_petugas_id');
            $table->string('tanggal', 12);
            $table->string('tanggal_pengembalian', 12);
            $table->enum('status', ['Berlangsung', 'Selesai', 'Perpanjangan']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}
