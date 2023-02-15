<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKavlingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kavling', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kategori_id')->unsigned();
            $table->string('luas_tanah', 6)->nullable();
            $table->string('nomor_kavling', 30)->nullable();
            $table->integer('harga')->nullable();
            $table->integer('angsuran')->nullable();
            $table->string('ukuran', 6)->nullable();
            $table->string('tipe', 6)->nullable();
            $table->string('no_ppjb', 20)->nullable();
            $table->string('no_ajb', 20)->nullable();
            $table->enum('status', ['Terjual', 'Belum Terjual']);
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
        Schema::drop('kavlings');
    }
}
