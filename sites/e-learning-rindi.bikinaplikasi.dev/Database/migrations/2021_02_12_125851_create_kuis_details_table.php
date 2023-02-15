<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuisDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuis_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('test_id')->index('test_details_test_id_foreign');
            $table->unsignedBigInteger('user_id')->index('test_details_user_id_foreign');
            $table->text('list_tests');
            $table->text('benar');
            $table->text('salah');
            $table->text('tidak_dijawab');
            $table->float('nilai', 10, 0);
            $table->enum('status', ['Selesai', 'Belum Selesai', 'Dibatalkan']);
            $table->unsignedTinyInteger('sisa_waktu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kuis_details');
    }
}
