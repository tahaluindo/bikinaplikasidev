<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTugassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tugass', function (Blueprint $table) {
            $table->foreign('mapel_id', 'tugass_ibfk_1')->references('id')->on('mapels')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tugass', function (Blueprint $table) {
            $table->dropForeign('tugass_ibfk_1');
        });
    }
}
