<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranSantriDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_santri_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pembayaran_santri_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pembayaran_santri_bulan_id');
            $table->mediumInteger('nominal_spp_dibayar');
            $table->mediumInteger('nominal_uang_makan_dibayar');
            $table->mediumInteger('nominal_belum_dibayar');
            $table->enum('status', ['Lunas', 'Belum Lunas', 'Bebas SPP', 'Bebas Makan', 'Santri Baru', 'Santri Keluar']);
            $table->date('tanggal_bayar');
            $table->string('catatan')->nullable();
            $table->timestamps();

            $table->foreign('pembayaran_santri_id')->references('id')->on('pembayaran_santris')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pembayaran_santri_bulan_id')->references('id')->on('pembayaran_santri_bulans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran_santri_details');
    }
}
