<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autor', function (Blueprint $table) {
            //id do autor
            $table->bigIncrements('id');
            //nome do autor
            $table->string('nome');
            //descrição do autor
            $table->text('descricao');
            //foto do autor (caminho da foto)
            $table->string('foto');
            //email do autor
            $table->string('email');
            //telefone do autor
            $table->string('telefone');
            //redes do autor
            /*
                para evitar a relação many to many
                vou colocar as redes como um atributo do 
                tipo text e armazenar como JSON.
                MODELO:
                {'redes':
                    'rede1' : 'link1',
                    'rede2' : 'link2'
                }
            */
            $table->text('redes');
            //senha do autor
            $table->text('senha');
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
        Schema::dropIfExists('autor');
    }
}
