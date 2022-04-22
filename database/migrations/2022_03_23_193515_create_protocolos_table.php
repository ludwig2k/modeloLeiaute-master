<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtocolosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protocolos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('atendente')->unsigned();
            $table->foreign('atendente')->references('id')->on('pessoas')->onDelete('cascade');
            $table->integer('receptor')->unsigned();
            $table->foreign('receptor')->references('id')->on('pessoas')->onDelete('cascade');
            $table->text('descricao');
            $table->date('data');
            $table->integer('prazo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('protocolos');
    }
}
