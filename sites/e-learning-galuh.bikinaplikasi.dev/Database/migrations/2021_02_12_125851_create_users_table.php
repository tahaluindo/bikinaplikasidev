<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kelas_id')->nullable()->index('kelas_id');
            $table->string('nama');
            $table->string('email', 30)->unique();
            $table->string('no_hp', 15)->nullable();
            $table->string('password', 100);
            $table->enum('level', ['admin', 'guru', 'siswa']);
            $table->enum('status', ['aktif', 'tidak aktif', 'pindah']);
            $table->string('no_identitas', 20)->nullable();
            $table->string('foto', 100);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
