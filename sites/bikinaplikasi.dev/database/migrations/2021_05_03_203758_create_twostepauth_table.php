<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTwostepauthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('twostepauth', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('userId')->index('twostepauth_userid_foreign');
            $table->string('authCode')->nullable();
            $table->integer('authCount');
            $table->boolean('authStatus')->default(0);
            $table->dateTime('authDate')->nullable();
            $table->dateTime('requestDate')->nullable();
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
        Schema::dropIfExists('twostepauth');
    }
}
