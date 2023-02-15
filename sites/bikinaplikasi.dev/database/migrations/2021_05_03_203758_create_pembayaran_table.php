<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_admin_id');
            $table->unsignedBigInteger('akun_pembayaran_id');
            $table->integer('jumlah');
            $table->enum('status', ['Menunggu Persetujuan', 'Dibayar', 'Ditolak', 'Refund', 'Menunggu Verifikasi'])->default('Menunggu Verifikasi');
            $table->text('token')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
}
