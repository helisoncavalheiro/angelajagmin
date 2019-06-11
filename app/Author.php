<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Author extends Authenticatable
{
    protected $table = 'authors';

    protected $fillable = [
      'name',
      'role',
      'email',
      'password'
    ];

   	public function posts()
    {
    	return $this->hasMany('App\Post');
    }


    public function new($data){

      Author::create([
          'name' => $data['name'],
          'role' => $data['role'],
          'email' => $data['email'],
          'password' => Hash::make($data['password']),
      ]);
    }
}
