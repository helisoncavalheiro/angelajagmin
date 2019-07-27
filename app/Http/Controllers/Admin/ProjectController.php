<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //nova instância de um projeto
        $projects = Project::all();
        //retorna a view projetos passando como parâmetro o array de projetos
        return view('admin.projects', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.form_project');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'title' => 'required|max:100',
            'description' => 'required',
            'image' => 'required|image'
        ];

        $messages = [
            'title.required' => 'É necessário fornecer um título para o projeto.',
            'title.max' => 'O título não dever possuir mais que 100 caracteres',
            'description.required' => 'É necessário fornecer uma descrição para  o projeto',
            'image.required' => 'É necessário fornecer uma imagem.',
            'image.image' => 'Apenas arquivos com as extensões .jpeg, .png, .bmp, .gif ou .svg são aceitos.'
        ];

        $request->validate($rules, $messages);

        // Nova instância de um projeto
        $project = new Project();
        //Captura o título da requisição
        $title = $request->input('title');
        //Captura a descrição da requisição
        $description = $request->input('description');
        //Captura a imagem da requisição
        $image = $request->file('image');

        //Salva no banco
        $project->createProject($title, $description, $image);

        //retorna para a página de projetos
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projeto = Project::findOrFail($id);
        return view('admin.form_projeto', compact($projeto));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.form_project', ["project" => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|max:100',
            'description' => 'required',
            'image' => 'image'
        ];

        $messages = [
            'title.required' => 'É necessário fornecer um título para o projeto.',
            'title.max' => 'O título não dever possuir mais que 100 caracteres',
            'description.required' => 'É necessário fornecer uma descrição para  o projeto',
            'image.image' => 'Apenas arquivos com as extensões .jpeg, .png, .bmp, .gif ou .svg são aceitos.'
        ];

        $request->validate($rules, $messages);

        // Nova instância de um projeto
        $project = new Project();
        //Captura o título da requisição
        $title = $request->input('title');
        //Captura a descrição da requisição
        $description = $request->input('description');
        //Captura a imagem da requisição
        $image = $request->file('image');

        //Salva no banco
        $project->updateProject($id, $title, $description, $image);

        //retorna para a página de projetos
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
