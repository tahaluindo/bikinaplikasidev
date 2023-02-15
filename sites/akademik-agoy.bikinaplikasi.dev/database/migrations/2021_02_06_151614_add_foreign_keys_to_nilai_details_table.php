<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToNilaiDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nilai_details', function (Blueprint $table) {
            $table->foreign('nilai_id', 'nilai_details_ibfk_1')->references('id')->on('nilais')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('user_id', 'nilai_details_ibfk_2')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nilai_details', function (Blueprint $table) {
            $table->dropForeign('nilai_details_ibfk_1');
            $table->dropForeign('nilai_details_ibfk_2');
        });
    }
}
