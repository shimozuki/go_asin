<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFkamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fkamars', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_kamar');
            $table->string('fkamar_name');
            $table->timestamps();
            
            $table->foreign('id_kamar')->references('id')->on('kamars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fkamars');
    }
}
