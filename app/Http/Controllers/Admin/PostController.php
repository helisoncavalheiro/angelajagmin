<?php

namespace App\Http\Controllers\Admin;

use App\Project;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Image;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
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
        $posts = Post::all();
        return view('admin.posts', [
            "posts" => $posts
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        $tags = Tag::all();
        return view('admin.forms.form_post', [
            "projects" => $projects,
            "tags" => $tags
        ]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        //Regras de validação
        $rules = [
            //Título obrigatório
            'title' => 'required',

            //Conteúdo obrigatório
            'content' => 'required',

            //Resumo obrigatório
            //Máximo 250 caracteres.
            'abstract' => 'required|string|max:550  ',

            /*
             * As imagens são obrigatórias
             * Deve ser um array
             * Deve ter no mínimo 1 imagem
            */
            'images' => 'required',
            'images.*' => 'image'

            //Adicionar as regras para autor e projeto quando for possível
        ];

        //Mensagens de erro customizadas
        $messages = [
            'title.required' => 'O título é obrigatório.',
            'content.required' => 'É necessário fornecer um conteúdo.',
            'images.required' => 'Selecione pelo menos 1 imagem.',
            'images.*.image' => 'Apenas arquivos com as extensões .jpeg, .png, .bmp, .gif ou .svg são aceitos.'
        ];

        //Validação dos dados
        /*
         * Caso haja algum erro, o usuário será redirecionado para a
         * página anterior e os erros serão exibidos na tela.
         * Caso os dados sejam validados, o código segue executando
         */
        $request->validate($rules, $messages);

        $videos = [];
        foreach ($request->input() as $pos => $input) {
            if (strpos($pos, 'video') === 0 && $input != "") {
                $videos[] = $input;
            }
        }

        $post = new Post();
        $post->createPost(
            $request->input('title'),
            $request->input('abstract'),
            $request->input('content'),
            $request->file('images'),
            $request->file('files'),
            $request->input('project'),
            $videos,
            $request->input('tags')
        );

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $projects = Project::all();
        $tags = Tag::all();
        $postTags = [];
        if(isset($post->tags)) {
            foreach ($post->tags as $tag) {
                $postTags[] = $tag->id;
            }
        }
        //dd($postTags);
        return view('admin.forms.form_post',
            ["post" => $post,
                "projects" => $projects,
                "tags" => $tags,
                "postTags" => $postTags
            ]);
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
            //Título obrigatório
            'title' => 'required',

            //Resumo obrigatório
            //Máximo 250 caracteres.
            'abstract' => 'required|string|max:550',

            //Conteúdo obrigatório
            'content' => 'required',

            /*
             * As imagens são obrigatórias
             * Deve ser um array
             * Deve ter no mínimo 1 imagem
            */
            'images.*' => 'image'
            //Adicionar as regras para autor e projeto quando for possível
        ];

        //Mensagens de erro customizadas
        $messages = [
            'title.required' => 'O título é obrigatório.',
            'content.required' => 'É necessário fornecer um conteúdo.',
            'abstract.required' => 'É necessário fornecer um resumo.',
            'abstract.max' => 'O resumo pode ter no máximo 500 caracteres',
            'images.*.image' => 'Apenas arquivos com as extensões .jpeg, .png, .bmp, .gif ou .svg são aceitos.'
        ];

        //Validação dos dados
        /*
         * Caso haja algum erro, o usuário será redirecionado para a
         * página anterior e os erros serão exibidos na tela.
         * Caso os dados sejam validados, o código segue executando
         */
        $request->validate($rules, $messages);

        $post = new Post();

        $videos = [];
        foreach ($request->input() as $pos => $input) {
            if (strpos($pos, 'video') === 0 && $input != "") {
                $videos[] = $input;
            }
        }
        $title = $request->input('title');
        $abstract = $request->input('abstract');
        $images = $request->file('images');
        $files = $request->file('files');
        $content = $request->input('content');
        $project = $request->input('project');
        $tags = $request->input('tags');

        $post->updatePost($id, $title, $abstract, $content, $images, $files, $project, $videos, $tags);
        //Retorna para o index
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
        $post = Post::find($id);
        $post->deletePost($post);
        return $this->index();
    }
}
