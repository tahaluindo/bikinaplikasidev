<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelass', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('wali_kelas')->unsigned();
            $table->bigInteger('ketua_kelas')->unsigned();
            $table->string('nama', 30);
            $table->string('ruang', 10);
            $table->timestamps();

            $table->foreign('wali_kelas')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ketua_kelas')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelass');
    }
}
