<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalEssaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_essays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mapel_id')->index('soal_essays_mapel_id_foreign');
            $table->text('soal');
            $table->string('gambar', 100)->nullable();
            $table->enum('jenis', ['Latihan', 'Ujian']);
            $table->tinyInteger('bobot');
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
        Schema::dropIfExists('soal_essays');
    }
}
