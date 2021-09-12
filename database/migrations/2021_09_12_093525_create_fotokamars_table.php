<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotokamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotokamars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tanah_id');
            $table->string('foto_kamar');
            $table->timestamps();

            $table->foreign('tanah_id')->references('id')->on('tanahs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fotokamars');
    }
}
