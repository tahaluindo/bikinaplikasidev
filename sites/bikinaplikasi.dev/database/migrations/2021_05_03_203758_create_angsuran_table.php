<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAngsuranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angsuran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pesanan_id');
            $table->unsignedTinyInteger('angsuran_ke');
            $table->enum('method', ['MYBVA', 'PERMATAVA', 'BNIVA', 'BRIVA', 'MANDIRIVA', 'BCAVA', 'SMSVA', 'ALFAMART', 'QRIS'])->nullable();
            $table->string('no', 50);
            $table->unsignedInteger('jumlah');
            $table->enum('status', ['Dibayar', 'Belum Dibayar'])->default('Belum Dibayar');
            $table->unsignedBigInteger('voucher_id')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('angsuran');
    }
}
