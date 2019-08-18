<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    public function posts(){
        return $this->belongsToMany('App\Post');
    }

    protected $fillable = [
        'name'
    ];

    public function createTag($name){
        $tag = Tag::create([
            'name' => $name
        ]);
        return $tag;
    }

    public function updateTag($id, $name){
        $tag = Tag::find($id);
        $tag->name = $name;
        $tag->save();
    }
}
