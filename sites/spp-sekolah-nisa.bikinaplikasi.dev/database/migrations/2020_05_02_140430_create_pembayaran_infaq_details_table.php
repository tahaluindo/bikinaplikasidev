<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranInfaqDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_infaq_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pembayaran_infaq_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('status', ['Lunas', 'Belum Lunas']);
            $table->date('tanggal_bayar');
            $table->text('catatan')->nullable();
            $table->mediumInteger('nominal_dibayar');
            $table->timestamps();

            $table->foreign('pembayaran_infaq_id')->references('id')->on('pembayaran_infaqs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran_infaq_details');
    }
}
