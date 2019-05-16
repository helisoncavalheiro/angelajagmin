<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
	public function publicacoes()
	{
		return $this->hasMany('App\Publicacao');
	}
}
