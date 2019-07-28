<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use SoftDeletes;
    public function posts()
	{
		return $this->hasMany('App\Post');
	}

	public function images(){
        return $this->hasOne('App\Image');
    }

    protected $fillable = [
        "title",
        "description"
    ];

	public function createProject($title, $description, $image){

        //Salva um novo projeto no banco
        $project = Project::create([
            'title' => $title,
            'description' => $description,
        ]);

        //Abre uma instância de imagem
        $imageObject = new Image();

        //Salva a imagem no sistema de arquivos e armazena essa imagem em
        //uma variável
        $storedImage = $imageObject->insertImage($image, 'project');

        //Associa a imagem carregada com o projeto
        $project->images()->save($storedImage);

    }

    public function updateProject($id, $title, $description, $image){

	    $project = Project::find($id);

	    $project->title = $title;
	    $project->description = $description;

	    if(isset($image)){

	        //Encontra a imagem que possui a referência do projeto
	        $oldImage = Image::where('project_id', $project->id)->get();

	        //Exclui do sistema de arquivos
	        Storage::delete($oldImage[0]->filepath);

	        //Exclui do projeto
	        $project->images()->delete();

            //Abre uma instância de imagem
            $imageObject = new Image();

            //Salva a imagem no sistema de arquivos e armazena essa imagem em
            //uma variável
            $storedImage = $imageObject->insertImage($image, 'project');

            //Associa a imagem carregada com o projeto
            $project->images()->save($storedImage);

	    }
    }

    public function deleteProject($project){
        Storage::delete($project->images->filepath);
	    $project->delete();
    }
}
