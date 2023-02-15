<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriterias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aspek_id');
            $table->string('nama', 30);
            $table->unsignedTinyInteger('target');
            $table->enum('jenis', ['Core Factor', 'Secondary Factor']);
            $table->timestamps();

            $table->foreign('aspek_id')->references('id')->on('aspeks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kriterias');
    }
}
