<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiLainnyaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_lainnya_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaksi_lainnya_id');
            $table->smallInteger('nominal_dibayar');
            $table->enum('status', ['Lunas', 'Belum Lunas']);
            $table->date('tanggal_bayar');
            $table->string('catatan');
            $table->timestamps();

            $table->foreign('transaksi_lainnya_id')->references('id')->on('transaksi_lainnyas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_lainnya_details');
    }
}
