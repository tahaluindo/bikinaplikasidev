<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapelDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapel_details', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedBigInteger('mapel_id')->nullable()->index('mapel_id');
            $table->unsignedBigInteger('kelas_id')->nullable()->index('mapel_details_ibfk_1');
            $table->unsignedBigInteger('user_id')->nullable()->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mapel_details');
    }
}
