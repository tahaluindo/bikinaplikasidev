<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuissTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuiss', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('guru_id')->index('tests_guru_id_foreign');
            $table->text('mapel_detail_ids');
            $table->text('soal_ids')->nullable();
            $table->string('nama', 50);
            $table->tinyInteger('jumlah_soal');
            $table->tinyInteger('jumlah_menit');
            $table->enum('jenis_soal', ['Latihan', 'Ujian']);
            $table->enum('mode', ['Essay Acak', 'Essay Normal', 'Pilgan Acak', 'Pilgan Normal']);
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_selesai');
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
        Schema::dropIfExists('kuiss');
    }
}
