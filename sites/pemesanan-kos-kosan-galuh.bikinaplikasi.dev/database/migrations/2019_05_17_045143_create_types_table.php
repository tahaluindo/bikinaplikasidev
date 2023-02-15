<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string("nama", 30);
            $table->integer("harga_harian")->nullable();
            $table->integer("harian_tambahan")->nullable();
            $table->integer("harga_mingguan")->nullable();
            $table->integer("mingguan_tambahan")->nullable();
            $table->integer("harga_bulanan")->nullable();
            $table->integer("bulanan_tambahan")->nullable();
            $table->integer("harga_tahunan")->nullable();
            $table->integer("tahunan_tambahan")->nullable();
            $table->string("fasilitas", 200)->nullable();
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
        Schema::dropIfExists('types');
    }
}
