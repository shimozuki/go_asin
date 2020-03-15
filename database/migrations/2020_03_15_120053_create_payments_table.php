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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sewa_id');
            $table->unsignedBigInteger('approve_by');
            $table->unsignedBigInteger('penyewa_id');
            $table->string('status_pembayaran');
            $table->string('bukti_pembayaran');
            $table->timestamps();

            $table->foreign('sewa_id')->references('id')->on('sewas')->onDelete('cascade');
            $table->foreign('approve_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('penyewa_id')->references('id')->on('users')->onDelete('cascade');

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
