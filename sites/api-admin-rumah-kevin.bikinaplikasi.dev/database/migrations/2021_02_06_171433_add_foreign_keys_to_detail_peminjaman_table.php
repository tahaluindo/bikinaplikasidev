<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetailPeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_peminjaman', function (Blueprint $table) {
            $table->foreign('buku_id', 'detail_peminjaman_ibfk_1')->references('id')->on('buku')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('peminjaman_id', 'detail_peminjaman_ibfk_2')->references('id')->on('peminjaman')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_peminjaman', function (Blueprint $table) {
            $table->dropForeign('detail_peminjaman_ibfk_1');
            $table->dropForeign('detail_peminjaman_ibfk_2');
        });
    }
}
