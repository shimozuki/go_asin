<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaction_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kamar_id');
            $table->enum('type_transfer',['Bank','E-Wallet'])->nullable();
            $table->string('nama_bank')->nullable();
            $table->string('nama_pemilik')->nullable();
            $table->integer('nomor_rekening')->nullable();
            $table->enum('status',['Pending','Success','Cancel'])->default('Pending');
            $table->integer('jumlah_bayar')->nullable();
            $table->string('bukti_bayar')->nullable(); //Image
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('kamar_id')->references('id')->on('kamars')->onUpdate('cascade');
            $table->foreign('transaction_id')->references('id')->on('transactions')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
