<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            //id do projeto
            $table->bigIncrements('id');
            //titulo do projeto
            $table->string('titulo');
            //descricao do projeto
            $table->text('descricao');
            //foto do projeto
            $table->string('foto');
            //timestamps (criado em e alterado em)
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
        Schema::dropIfExists('projects');
    }
}
