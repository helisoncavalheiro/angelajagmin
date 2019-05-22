<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            //id do autor
            $table->bigIncrements('id');
            //tipo do autor
            $table->string('role');
            //nome do autor
            $table->string('name');
            //descrição do autor
            $table->text('description');
            //foto do autor (caminho da foto)
            $table->string('photo');
            //telefone do autor
            $table->string('phone');
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
            $table->text('social');
            //email do autor (login)
            $table->string('email');            
            //senha do autor
            $table->text('password');
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
        Schema::dropIfExists('authors');
    }
}
