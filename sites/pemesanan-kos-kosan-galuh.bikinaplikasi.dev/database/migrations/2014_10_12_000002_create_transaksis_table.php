<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->date('tggl');
            $table->integer('total');
            $table->text('keterangan', 500)->nullable();
            $table->enum('jenis', ['Pemasukan', 'Pengeluaran']);
            $table->enum('methode', ['Cash', 'Bank', 'Nyicil'])->nullable();
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
        Schema::dropIfExists('transaksis');
    }
}
