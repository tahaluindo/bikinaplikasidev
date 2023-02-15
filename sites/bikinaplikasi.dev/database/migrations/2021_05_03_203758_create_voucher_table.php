<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('kode_voucher', 15)->nullable();
            $table->unsignedMediumInteger('potongan')->nullable();
            $table->tinyInteger('dipakai')->nullable();
            $table->tinyInteger('limit')->nullable();
            $table->enum('dalam', ['rupiah', 'persen'])->default('rupiah');
            $table->char('khusus_user', 255)->nullable();
            $table->char('khusus_produk', 255)->nullable();
            $table->timestamp('expired_at')->nullable()->useCurrent();
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
        Schema::dropIfExists('voucher');
    }
}
