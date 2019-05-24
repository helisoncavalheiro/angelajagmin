<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            //id da publicacao
            $table->bigIncrements('id');
            //projeto da publicacao
            $table->bigInteger('project')->unsigned()->nullable($value = true);
            //autor da publicacao
            $table->bigInteger('author')->unsigned()->nullable($value = true);
            //timestamps (criado em e alterado em)
            $table->timestamps();
            //titulo da publicacao
            $table->string('title');
            //conteudo da publicacao
            $table->text('content');
            //situacao da publicacao
            $table->string('status')->nullable($value = true);
        });

        Schema::table('posts', function(Blueprint $table) {
            $table->foreign('project')->references('id')->on('projects');
            $table->foreign('author')->references('id')->on('authors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
