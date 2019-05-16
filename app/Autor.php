<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    //

    public function publicacoes()
    {
    	return $this->hasMany('App\Publicacao');
    }
}
