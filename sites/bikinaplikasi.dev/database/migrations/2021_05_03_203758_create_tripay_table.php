<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tripay', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('angsuran_id')->index('angsuran_id');
            $table->enum('jenis', ['open', 'closed'])->nullable();
            $table->text('payment_request_response');
            $table->text('payment_requset_detail');
            $table->text('callback_response');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tripay');
    }
}
