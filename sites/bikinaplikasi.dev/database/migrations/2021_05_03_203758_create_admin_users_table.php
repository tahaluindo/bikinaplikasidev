<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 190)->unique();
            $table->string('password', 100);
            $table->string('name');
            $table->string('email');
            $table->string('avatar', 3000)->nullable();
            $table->unsignedInteger('saldo')->nullable()->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->string('provider', 30)->nullable();
            $table->string('socialite_id', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_users');
    }
}
