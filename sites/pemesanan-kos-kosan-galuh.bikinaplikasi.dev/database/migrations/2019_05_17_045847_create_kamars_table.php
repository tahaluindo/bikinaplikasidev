<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamars', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->unsignedTinyInteger('type_id');
            $table->tinyInteger('nomor')->unique();
            $table->tinyInteger('jumlah_penghuni')->default(0);
            $table->text('keterangan', 500)->nullable();
            $table->text('lokasi', 50);
            $table->enum('status', ['Terisi', 'Kosong', 'Ditinggal', 'Rusak']);
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kamars');
    }
}
