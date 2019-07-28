<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;
use Illuminate\Mail\Transport\ArrayTransport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function category()
    {
        return $this->belongsToMany('App\Category');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    protected $fillable = [
        "title",
        "content",
        "abstract",
        "project",
        "author"
    ];

    public function createPost($title, $abstract, $content, $images, $project)
    {
        $post = Post::create([
            'title' => $title,
            'abstract' => $abstract,
            'content' => $content
        ]);

        $post->project()->associate($project);
        $post->save();

        $imageObject = new Image();
        foreach ($images as $imageRequest) {
            $storedImage = $imageObject->insertImage($imageRequest, 'post');
            $post->images()->save($storedImage);
        }
    }

    public function updatePost($id, $title, $abstract, $content, $images)
    {
        $post = Post::find($id);

        $post->title = $title;
        $post->content = $content;
        $post->abstract = $abstract;
        $post->save();

        if (isset($images)) {
            $imageObject = new Image();
            foreach ($images as $image) {
                $storedImage = $imageObject->insertImage($image, 'post');
                $post->images()->save($storedImage);
            }
        }

    }

    public function deletePost($post)
    {
        $post->delete();
    }
}
