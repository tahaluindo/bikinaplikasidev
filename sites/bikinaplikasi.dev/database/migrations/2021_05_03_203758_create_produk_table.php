<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama', 50);
            $table->integer('harga')->nullable()->default(0);
            $table->integer('harga_promo')->nullable()->default(0);
            $table->integer('bonus_rujukan')->nullable();
            $table->tinyInteger('jumlah_angsuran')->default(0);
            $table->integer('dp');
            $table->text('deskripsi');
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
