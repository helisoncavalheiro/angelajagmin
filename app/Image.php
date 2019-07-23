<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
    	"post",
    	"filepath"
    ];

    public function insertImage($image, $type_img){
        //Aramzena a imagem no caminho especificado
        //**NOTE: o método store() retorna o caminho da imagem armazenda
        $filename = $image->store('images/' . $type_img);

        // cria um novo objeto da Imagem
        // configurando o caminho da imagem armazenada
        $image = new Image([
            'filepath' => $filename
        ]);

        return $image;


    }

    public function removeImage(){

    }

}
