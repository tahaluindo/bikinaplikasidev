<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToKomentarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('komentars', function (Blueprint $table) {
            $table->foreign('informasi_id', 'komentars_ibfk_1')->references('id')->on('informasis')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('user_id', 'komentars_ibfk_2')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('komentars', function (Blueprint $table) {
            $table->dropForeign('komentars_ibfk_1');
            $table->dropForeign('komentars_ibfk_2');
        });
    }
}
