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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wali_kelas')->nullable()->index('kelass_wali_kelas_foreign');
            $table->unsignedBigInteger('ketua_kelas')->nullable()->index('kelass_ketua_kelas_foreign');
            $table->string('nama', 30);
            $table->string('ruang', 10);
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
        Schema::dropIfExists('kelass');
    }
}
