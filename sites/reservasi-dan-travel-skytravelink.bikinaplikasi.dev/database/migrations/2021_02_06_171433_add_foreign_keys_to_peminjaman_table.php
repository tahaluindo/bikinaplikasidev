<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->foreign('anggota_id', 'peminjaman_ibfk_1')->references('id')->on('anggota')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('user_petugas_id', 'peminjaman_ibfk_2')->references('id')->on('user')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->dropForeign('peminjaman_ibfk_1');
            $table->dropForeign('peminjaman_ibfk_2');
        });
    }
}
