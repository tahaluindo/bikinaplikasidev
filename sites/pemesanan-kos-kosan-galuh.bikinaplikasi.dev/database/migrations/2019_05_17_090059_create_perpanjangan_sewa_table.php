<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerpanjanganSewaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perpanjangan_sewas', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('tagihan_id', 50);
            $table->enum('jenis_perpanjangan', ['Harian', 'Mingguan', 'Bulanan', 'Tahunan']);
            $table->tinyInteger('lama_perpanjangan');
            $table->dateTime('untuk_tempo');
            $table->integer('biaya');
            $table->integer('biaya_tambahan');
            $table->integer('total');
            $table->enum('methode', ['Bank', 'Cash', 'Bank Nyicil', 'Cash Nyicil']);
            $table->enum('status', ['Lunas', 'Belum Lunas']);
            $table->timestamps();

            $table->foreign('tagihan_id')->references('invoice_id')->on('tagihans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perpanjangan_sewas');
    }
}
