<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function author()
    {
    	return $this->belongsTo('App\Author');
    }

    public function project(){
    	return $this->belongsTo('App\Project');
    }

    public function category(){
    	return $this->belongsToMany('App\Category');
    }

    public function images(){
        return $this->hasMany('App\Image');
    }

    protected $fillable = [
        "title",
        "content",
        "status",
        "project",
        "author"
    ];
}
