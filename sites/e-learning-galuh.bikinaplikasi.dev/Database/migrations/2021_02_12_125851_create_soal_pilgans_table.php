<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalPilgansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_pilgans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mapel_id')->index('soal_pilgans_mapel_id_foreign');
            $table->text('soal');
            $table->string('opsi_a', 255);
            $table->string('opsi_b', 255);
            $table->string('opsi_c', 255);
            $table->string('opsi_d', 255);
            $table->enum('jawaban', ['A', 'B', 'C', 'D']);
            $table->enum('jenis', ['Latihan', 'Ujian']);
            $table->string('gambar', 100)->nullable();
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
        Schema::dropIfExists('soal_pilgans');
    }
}
