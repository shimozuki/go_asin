<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanahs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('slug');
            $table->string('nama');
            $table->string('luas');
            $table->integer('stok');
            $table->integer('sisa');
            $table->integer('harga_sewa');
            $table->string('ket_lain')->nullable();
            $table->string('ket_biaya')->nullable();
            $table->string('desc')->nullable();
            $table->enum('kategori',['tanah kosong','tanah dan bangunan']);
            $table->enum('book',[0,1]); // 0 no
            $table->enum('listrik',[0,1]); // 0 no
            $table->string('provinsi_id');
            $table->string('bg_foto');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanahs');
    }
}
