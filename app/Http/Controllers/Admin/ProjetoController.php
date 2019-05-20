<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Projeto;
class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                //nova instância de um projeto
        $projetos = Projeto::all();
        //retorna a view projetos passando como parâmetro o array de projetos
        return view('admin.projetos', [
            'projetos' => $projetos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.form_projeto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //caminho das imagens dos projetos
        $spath = "/images/projetos/";

        // Nova instância de um projeto
        $projeto = new Projeto();
        //Captura o título da requisição
        $projeto->titulo = $request->input('titulo');
        //Captura a descrição da requisição
        $projeto->descricao = $request->input('descricao');
        
        //Testa se existe a imagem na requisição e se não houveram erros no upload
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            //Captura a imagem da requisição
            $file = $request->file('imagem');
            //Armazena a imagem no caminho /storage/public/images/projetos
            $file->store('images/projetos');
            //Captura o novo nome gerado para a imagem
            $name = $file->hashName();
            //Salva o novo nome da imagem
            $projeto->foto = $spath . $name;
            //return $projeto->foto;
        }
        //Salva no banco    
        $projeto->save();
        //retorna para a página de projetos
        return view('admin.projetos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projeto = Projeto::findOrFail($id);
        return view('admin.form_projeto', compact($projeto));
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
