<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('ransaction_number');
            $table->unsignedBigInteger('kamar_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('lama_sewa');
            $table->integer('harga_kamar');
            $table->integer('harga_total');
            $table->string('tgl_sewa');
            $table->enum('status',['Pending','Proses','Done','Cancel']);
            $table->timestamps();

            $table->foreign('kamar_id')->references('id')->on('kamars')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
