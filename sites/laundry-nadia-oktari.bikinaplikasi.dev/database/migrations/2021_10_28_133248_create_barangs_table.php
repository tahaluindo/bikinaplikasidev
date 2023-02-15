<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('jenis_id');
            $table->string('kode')->nullable();
            $table->string('nama')->nullable();
            $table->integer('jumlah')->nullable();
            $table->integer('umur_manfaat')->nullable();
            $table->integer('harga_per_unit')->nullable();
            $table->integer('nilai_perolehan')->nullable();
            $table->integer('penyusutan_per_tahun')->nullable();
            $table->string('kondisi');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('barangs');
    }
}
