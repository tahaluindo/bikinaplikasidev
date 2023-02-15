<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToKuisDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kuis_details', function (Blueprint $table) {
            $table->foreign('test_id', 'test_details_test_id_foreign')->references('id')->on('kuiss')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('user_id', 'test_details_user_id_foreign')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kuis_details', function (Blueprint $table) {
            $table->dropForeign('test_details_test_id_foreign');
            $table->dropForeign('test_details_user_id_foreign');
        });
    }
}
