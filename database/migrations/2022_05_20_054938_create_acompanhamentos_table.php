<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcompanhamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acompanhamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('observacao');
            $table->date('data1');
            $table->integer('usuario')->unsigned();
            $table->foreign('usuario')->references('id')->on('pessoas')->onDelete('cascade');
            $table->integer('protocolo_id1')->unsigned();
            $table->foreign('protocolo_id1')->references('id')->on('protocolos')->onDelete('cascade');
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
        Schema::dropIfExists('acompanhamentos');
    }
}
