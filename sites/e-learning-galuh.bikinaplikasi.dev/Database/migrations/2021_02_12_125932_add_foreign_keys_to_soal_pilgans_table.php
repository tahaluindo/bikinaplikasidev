<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSoalPilgansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soal_pilgans', function (Blueprint $table) {
            $table->foreign('mapel_id')->references('id')->on('mapels')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('soal_pilgans', function (Blueprint $table) {
            $table->dropForeign('soal_pilgans_mapel_id_foreign');
        });
    }
}
