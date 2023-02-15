<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTentangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tentangs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nama_developer')->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('versi')->nullable();
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tentangs');
    }
}
