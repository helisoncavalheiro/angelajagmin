<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Author;
class AuthorController extends Controller
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
        $author = Author::all();
        return view('admin.authors', [
            "author" => $author
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $rules = [
            'name' => ['required', 'string'],
            'role' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:authors'],
            'password' => ['required', 'string']
      ];

      $messages = [
        'name.required' => 'Nome é obrigatório.',
        'role.required' => 'Papel é obrigatório.',
        'email.required' => 'Email é obrigatório.',
        'email.email' => 'Deve ser um email válido (Ex.: exemplo@gmail.com).',
        'password.required' => 'Senha é obrigatória.',
      ];

      $request->validate($rules, $messages);

      $data['name'] = $request->input('name');
      $data['role'] = $request->input('role');
      $data['email'] = $request->input('email');
      $data['password'] = $request->input('password');

      $author = new Author();
      $author->new($data);

      return view('admin.authors');
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
