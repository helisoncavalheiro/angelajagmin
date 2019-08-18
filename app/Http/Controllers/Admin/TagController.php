<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
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
        $tags = Tag::all();
        return view('admin.tags', ['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.forms.form_tag');
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
            'name' => 'required',
        ];

        $messages = [
            'name.required' => 'Nome não pode ser vazio.'
        ];

        $request->validate($rules, $messages);

        $name = $request->input('name');

        $tag = new Tag();
        $tag->createTag($name);

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
        $tag = Tag::find($id);
        return view('admin.forms.form_tag', ['tag' => $tag]);
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
            'name' => 'required',
        ];

        $messages = [
            'name.required' => 'Nome não pode ser vazio.'
        ];

        $request->validate($rules, $messages);

        $name = $request->input('name');

        $tag = new Tag();
        $tag->updateTag($id, $name);

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

    }

    public function deleteTag($id)
    {
        $tag = Tag::find($id);
        $tag->delete();

        return $this->index();
    }
}
