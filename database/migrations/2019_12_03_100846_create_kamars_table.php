<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_user');
            $table->string('nama_kamar');
            $table->string('jenis_kamar');
            $table->string('luas_kamar');
            $table->string('stok_kamar');
            $table->string('sisa_kamar');
            $table->string('harga_kamar');
            $table->string('ket_lain')->nullable();
            $table->string('ket_biaya')->nullable();
            $table->string('desc')->nullable();
            $table->string('kategori');
            $table->string('book');
            $table->string('listrik');
            $table->string('provinsi_id');
            $table->string('provinsi_nama');
            $table->string('bg_foto');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kamars');
    }
}
