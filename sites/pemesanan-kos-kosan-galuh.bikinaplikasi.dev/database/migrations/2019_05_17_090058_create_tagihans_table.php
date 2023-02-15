<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagihans', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('invoice_id', 50)->unique();
            $table->unsignedTinyInteger('penyewa_id');
            $table->dateTime('terakhir_bayar')->nullable();
            $table->dateTime('jatuh_tempo');
            $table->enum('status', ['Aktif', 'Tidak Aktif', 'Menunggak', 'Nyicil']);

            $table->foreign('penyewa_id')->references('id')->on('penyewas')->onDelete('cascade');

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
        Schema::dropIfExists('tagihans');
    }
}
