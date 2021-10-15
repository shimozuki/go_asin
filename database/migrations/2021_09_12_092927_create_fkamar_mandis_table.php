<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFkamarMandisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fkamar_mandis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tanah_id')->nullable();
            $table->string('name')->nullable();
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
        Schema::dropIfExists('fkamar_mandis');
    }
}
