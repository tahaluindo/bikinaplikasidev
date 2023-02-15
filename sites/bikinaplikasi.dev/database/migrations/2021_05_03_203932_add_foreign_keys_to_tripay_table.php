<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTripayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tripay', function (Blueprint $table) {
            $table->foreign('angsuran_id', 'angsuran_id')->references('id')->on('angsuran')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tripay', function (Blueprint $table) {
            $table->dropForeign('angsuran_id');
        });
    }
}
