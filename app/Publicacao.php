<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model
{
    public function autor()
    {
    	return $this->belongsTo('App\Autor');
    }

    public function projeto(){
    	return $this->belongsTo('App\Projeto');
    }

    public function categorias(){
    	return $this->belongsToMany('App\Categoria');
    }

}
