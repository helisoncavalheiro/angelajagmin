@extends('layouts.admin')

@section('admin-content')
    <div class="col m9 push-m3">
        <div class="container">
            <div class="section">
                <form
                    method="POST"
                    enctype="multipart/form-data"
                    @if(isset($project))
                    action="{{ action('Admin\ProjectController@update', ['id' => $project->id]) }}"
                    @else
                    action="{{ action('Admin\ProjectController@store') }}"
                    @endif
                >

                    {{ csrf_field() }}

                    @if(isset($project))
                        {{ method_field('PATCH') }}
                    @endif

                    <div class="section">
                        <label for="titulo">Título do projeto: </label>
                        <input
                            type="text"
                            name="title"
                            id="titulo"
                            @if(isset($project))
                            value="{{ $project->title  }}"
                            @endif
                        >
                    </div>

                    <div class="section">
                        <label for="editor1">Descrição do projeto: </label>
                        <textarea name="description" id="description" rows="20">
                            @if(isset($project))
                            {{ $project->description  }}
                            @endif
                        </textarea>
                        <br/>
                        <div class="divider"></div>
                    </div>

                    <div class="section">
                        <label>Imagem: </label>
                        <div class="row">
                            <div class="col m5">
                                <div class="file-field input-field">
                                    <div class="btn blue">
                                        <span><i class="material-icons medium">add</i></span>
                                        <input type="file" name="image" id="imageInput">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="image-preview">
                                @if(isset($project))
                                    <div class="col m9">
                                        <img class="responsive-img" src="{{ secure_asset('storage/' . $project->images->filepath )  }}">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row section">
                        <button id="submit" class="col s2 offset-s5 btn waves-effect waves-light green" type="submit"
                                name="action">
                            <i class="material-icons right">send</i>
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ secure_asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ secure_asset('assets/admin/js/form_project_script.js') }}"></script>

@endsection
