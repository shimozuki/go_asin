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
            $table->unsignedBigInteger('idkamar_mandi');
            $table->string('fkamar_mandi');
            $table->timestamps();

            $table->foreign('idkamar_mandi')->references('id')->on('kamars')->onDelete('cascade');
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
