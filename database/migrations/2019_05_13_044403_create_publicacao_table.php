<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacao', function (Blueprint $table) {
            //id da publicacao
            $table->bigIncrements('id');
            //projeto da publicacao
            $table->bigInteger('projeto')->unsigned();
            //autor da publicacao
            $table->bigInteger('autor')->unsigned();
            //timestamps (criado em e alterado em)
            $table->timestamps();
            //titulo da publicacao
            $table->string('titulo');
            //imagem da publicacao
            $table->text('imagem');
            //conteudo da publicacao
            $table->text('conteudo');
            //arquivos da publicacao (vai ser um json)
            $table->text('arquivos');
            //situacao da publicacao
            $table->boolean('situacao');
        });

        Schema::table('publicacao', function(Blueprint $table) {
            $table->foreign('projeto')->references('id')->on('projeto');
            $table->foreign('autor')->references('id')->on('autor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicacao');
    }
}
