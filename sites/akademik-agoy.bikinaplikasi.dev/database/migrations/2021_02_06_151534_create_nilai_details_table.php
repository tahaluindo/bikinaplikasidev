<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nilai_id')->index('nilai_id');
            $table->unsignedBigInteger('user_id')->index('nilai_details_ibfk_2');
            $table->float('angka_kl_3', 10, 0)->nullable();
            $table->enum('predikat_kl_3', ['A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'D+', 'D'])->nullable();
            $table->float('angka_kl_4', 10, 0)->nullable();
            $table->enum('predikat_kl_4', ['A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'D+', 'D'])->nullable();
            $table->enum('dalam_mapel_kl_1_kl_2', ['SB', 'B', 'C', 'K'])->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_details');
    }
}
