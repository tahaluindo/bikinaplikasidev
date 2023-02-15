<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_buku', 20);
            $table->string('judul', 100);
            $table->string('penulis', 30);
            $table->string('penerbit', 30);
            $table->smallInteger('tahun');
            $table->string('kota', 30);
            $table->smallInteger('stok');
            $table->string('ditambahkan', 12);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
}
