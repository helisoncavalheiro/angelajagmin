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

    public function files()
    {
        return $this->hasMany('App\File');
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag', 'post_tag');
    }

    protected $fillable = [
        "title",
        "content",
        "abstract",
        "project",
        "author"
    ];

    public function createPost($title, $abstract, $content, $images, $files, $project, $videos, $tags)
    {
        $post = Post::create([
            'title' => $title,
            'abstract' => $abstract,
            'content' => $content
        ]);

        $post->project()->associate($project);
        $post->tags()->attach($tags);

        $post->save();

        $imageObject = new Image();
        foreach ($images as $imageRequest) {
            $storedImage = $imageObject->insertImage($imageRequest, 'post');
            $post->images()->save($storedImage);
        }
        if (isset($files)) {
            $fileObject = new File();
            foreach ($files as $fileRequest) {
                $storedFile = $fileObject->insertFile($fileRequest);
                $post->files()->save($storedFile);
            }
        }

        if (isset($videos)) {
            $videoObject = new Video();
            foreach ($videos as $video) {
                $savedVideo = $videoObject->insertVideo($video);
                $post->videos()->save($savedVideo);
            }
        }
    }

    public function updatePost($id, $title, $abstract, $content, $images, $files, $project, $videos, $tags)
    {
        $post = Post::find($id);

        $post->title = $title;
        $post->content = $content;
        $post->abstract = $abstract;
        $post->project()->associate($project);

        $post->tags()->detach();
        $post->tags()->attach($tags);

        $post->save();

        if (isset($images)) {
            $imageObject = new Image();
            foreach ($images as $image) {
                $storedImage = $imageObject->insertImage($image, 'post');
                $post->images()->save($storedImage);
            }
        }

        if (isset($files)) {
            $fileObject = new File();
            foreach ($files as $fileRequest) {
                $storedFile = $fileObject->insertFile($fileRequest);
                $post->files()->save($storedFile);
            }
        }

        if (isset($videos)) {
            $videoObject = new Video();
            foreach ($videos as $video) {
                $savedVideo = $videoObject->insertVideo($video);
                $post->videos()->save($savedVideo);
            }
        }

    }

    public function deletePost($post)
    {
        $images = $post->images;

        foreach ($images as $image) {
            $image->removeImage($image);
        }

        $post->delete();
    }
}
