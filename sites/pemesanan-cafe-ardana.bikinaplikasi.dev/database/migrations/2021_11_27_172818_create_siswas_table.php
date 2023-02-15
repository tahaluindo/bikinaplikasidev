<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nis', 20);
            $table->string('nama', 30);
            $table->enum('jenis_kelamin', ["Laki - Laki", "Perempuan"]);
            $table->text('alamat', 255);
            $table->string('no_hp', 15);
            $table->string('berkas', 100);
            $table->enum('status', ["Baru Mendaftar", "Pendaftaran Diterima"]);
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
        Schema::drop('siswas');
    }
}
