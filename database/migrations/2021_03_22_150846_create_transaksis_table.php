<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kamar_id');
            $table->enum('lama_sewa',['1,2,3,4,5,6']); // bulan
            $table->integer('harga_kamar');
            $table->integer('disc')->nullable();
            $table->integer('total_harga_sewa');
            $table->enum('status',['Pending','Proses','Done','Cancel'])->default('Pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kamar_id')->references('id')->on('kamars')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
