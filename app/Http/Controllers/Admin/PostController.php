<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.publicacoes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.form_add_publicacao');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            //Captura a imagem da requisição
            $upfile = $request->file('imagem');
            //Armazena a imagem no caminho /storage/public/images/projetos
            $upfile->store('images/projetos');
            //Captura o novo nome gerado para a imagem
            $name = $file->hashName();
            //Salva o novo nome da imagem
            $nfile = $spath . $name; 
        }else{
            $nfile = null;
        }

        Post::create([
            "titulo" => $request->input('titulo'),
            "imagem" => $nfile,
            "conteudo" => $request->input('conteudo'),
            "arquivos" => null,
            "situacao" => $request->input('situacao'),
            "projeto" => null,
            "autor" => null
        ]);

        return view('admin.publicacoes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
