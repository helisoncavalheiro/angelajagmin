<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function publicacoes(){
    	return $this->belongsToMany('App\Publicacao');
    }
}
