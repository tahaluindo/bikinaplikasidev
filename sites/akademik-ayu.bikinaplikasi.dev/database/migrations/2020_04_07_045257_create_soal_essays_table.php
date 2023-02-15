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
            $table->id();
            $table->bigInteger('mapel_id')->unsigned();
            $table->text('soal');
            $table->string('gambar', 100)->nullable();
            $table->enum('jenis', ['Latihan', 'Ujian']);
            $table->tinyInteger('bobot');
            $table->timestamps();

            $table->foreign('mapel_id')->references('id')->on('mapels')->onDelete('cascade');
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
