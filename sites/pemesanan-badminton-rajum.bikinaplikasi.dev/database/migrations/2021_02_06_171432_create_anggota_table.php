<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_induk', 20);
            $table->string('nama', 30);
            $table->enum('jenis_kelamin', ['Laki - Laki', 'Perempuan']);
            $table->string('alamat', 100);
            $table->string('no_telepon', 15);
            $table->enum('status', ['Aktif', 'Tidak Aktif']);
            $table->string('dibuat', 12);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota');
    }
}
