<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenyewasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyewas', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->unsignedTinyInteger('kamar_id')->nullable();
            $table->enum('type_sewa', ['Harian', 'Mingguan', 'Bulanan', 'Tahunan']);
            $table->string('nama', 50);
            $table->string('no_hp', 13)->unique();
            $table->enum('status', ['Ada', 'Meninggalkan', 'Selesai Ngekos']);
            $table->string('foto_identitas', 50);
            $table->timestamps();

            $table->foreign('kamar_id')->references('id')->on('kamars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penyewas');
    }
}
