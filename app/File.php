<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use SoftDeletes;

    public function post(){
        return $this->belongsTo('App\Post');
    }

    protected $fillable = [
        'name',
        'filepath'
    ];

    public function insertFile($uploadedFile){
        //Aramzena o arquivo no caminho especificado
        //**NOTE: o método store() retorna o caminho da imagem armazenda
        $filename = $uploadedFile->store('files/');

        // cria um novo objeto do Arquivo
        // configurando o caminho do arquivo armazenado
        $file = new File([
            'name' => $uploadedFile->getClientOriginalName(),
            'filepath' => $filename
        ]);

        return $file;
    }

    public function deleteFile($file){
        Storage::delete($file->filepath);
        $file->delete();
    }
}
