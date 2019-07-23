<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;
use Illuminate\Support\Facades\Storage;

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

    public function createPost($title, $abstract, $content, $images){
        $post = Post::create([
            'title' =>$title,
            'abstract' => $abstract,
            'content' => $content
        ]);

        $imageObject = new Image();
        foreach ($images as $imageRequest){

            //chama o método que salva a imagem no servidor
            //retorna a imagem que foi salva
            $savedImage = $imageObject->insertImage($imageRequest, 'post');

            //Salva o objeto da imagem no banco
            $post->images()->save($savedImage);
        }
    }

    public function updatePost($id, $title, $content, $images, $status){
        $post = Post::find($id);

        $post->title = $title;
        $post->content = $content;
        $post->status = $status;
        $post->save();
        $old_images = $post->images;

        foreach ($old_images as $old_image){
            Storage::delete($old_image->filepath);
            $old_image->delete();
        }

        $path = "images/posts";
        foreach ($images as $photo) {
          //Aramzena a imagem no caminho especificado
          //**NOTE: o método store() retorna o caminho da imagem armazenda
          $filename = $photo->store($path);
          // cria um novo objeto da Imagem
          // configurando o caminho da imagem armazenada
          $image = new Image([
              'filepath' => $filename
          ]);
          //Salva o objeto da imagem no banco
          $post->images()->save($image);
        }
    }
}
