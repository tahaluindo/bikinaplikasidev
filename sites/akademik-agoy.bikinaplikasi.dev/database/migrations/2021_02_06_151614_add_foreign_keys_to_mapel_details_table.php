<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMapelDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mapel_details', function (Blueprint $table) {
            $table->foreign('kelas_id', 'mapel_details_ibfk_1')->references('id')->on('kelass')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign('mapel_id', 'mapel_details_ibfk_2')->references('id')->on('mapels')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign('user_id', 'mapel_details_ibfk_3')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mapel_details', function (Blueprint $table) {
            $table->dropForeign('mapel_details_ibfk_1');
            $table->dropForeign('mapel_details_ibfk_2');
            $table->dropForeign('mapel_details_ibfk_3');
        });
    }
}
