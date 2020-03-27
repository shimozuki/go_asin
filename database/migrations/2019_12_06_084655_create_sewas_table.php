<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSewasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sewas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kamar_id');
            $table->unsignedBigInteger('pemilik_id');
            $table->string('nama_pemilik');
            $table->string('email_pemilik');
            $table->string('nama_user');
            $table->string('email_user');
            $table->string('nama_kamar');
            $table->string('harga_kamar');
            $table->string('lama_sewa');
            $table->string('nama_bank');
            $table->string('no_rek');
            $table->text('notes')->nullable();
            $table->string('invoice');
            $table->string('jenis');
            $table->string('status');
            $table->string('start');
            $table->string('end');
            $table->string('tgl_book')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kamar_id')->references('id')->on('kamars')->onDelete('cascade');
            $table->foreign('pemilik_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sewas');
    }
}
