<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTugasDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tugas_details', function (Blueprint $table) {
            $table->foreign('tugas_id', 'tugas_details_ibfk_1')->references('id')->on('tugass')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tugas_details', function (Blueprint $table) {
            $table->dropForeign('tugas_details_ibfk_1');
        });
    }
}
