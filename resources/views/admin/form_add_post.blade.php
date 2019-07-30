@extends('layouts.admin')

@section('admin-content')
    <div class="col m9 push-m3">
        <div class="container">
            <div class="section">
                <form
                    id="form" method="POST" enctype="multipart/form-data"
                    @if(!isset($post))
                    action="{{ action('Admin\PostController@store') }}"
                    @else
                    action="{{ action('Admin\PostController@update', ['id' => $post->id]) }}"
                    @endif
                >
                {{ csrf_field() }}

                @if(isset($post))
                    {{ method_field('PATCH') }}
                @endif

                <!-- Input do título -->
                    <div class="section">
                        <label for="titulo" class="header">Título: </label>
                        <input
                            id="titulo"
                            type="text"
                            name="title"
                            placeholder="Insira um título"
                            class="tooltipped validate"
                            data-position="bottom"
                            data-tooltip="O título fica em negrito por padrão"
                            @if(isset($post))
                            value="{{ $post->title  }}"
                            @endif
                            value="{{old('title')}}"
                        />
                        @error('title')
                        <span class="helper-text errors">{{ $message }}</span>
                        @enderror
                    </div>

                    <!--editor do resumo -->
                    <div class="section">
                        <label for="content">Resumo: (Texto que aparece na página inicial. Máximo 500
                            caracteres.) </label>
                        <textarea name="abstract" id="abstract" rows="20">
                            @if(isset($post))
                                {{$post->abstract}}
                            @else
                                @error('abstract')
                                    {{ old('abstract') }}
                                @enderror
                            @endif

                        </textarea>
                        <br/>
                        <div class="divider"></div>
                        @error('abstract')
                        <span class="helper-text errors">{{ $message }}</span>
                        @enderror
                    </div>

                    <!--editor de texto -->
                    <div class="section">
                        <label for="content">Conteúdo: </label>
                        <textarea name="content" id="content" rows="20">
                            @if(isset($post))
                                {{ $post->content }}
                            @else
                                @error('abstract')
                                    {{ old('content') }}
                                @enderror
                            @endif
                        </textarea>
                        <br/>
                        <div class="divider"></div>
                        @error('content')
                        <span class="helper-text errors">{{ $message }}</span>
                        @enderror
                    </div>


                    <!--input da imagem -->
                    <div class="section">
                        <div class="images-preview section">
                            @if(isset($post))
                                <label>Imagens já carregadas:</label>
                                <div class="old_images row">
                                    @foreach($post->images as $img)
                                        <div class="col s3">
                                            <img src="{{ secure_asset('storage/' . $img->filepath) }}"
                                                 class="responsive-img"/>
                                        </div>
                                        <a href="{{ action('Admin\ImageController@delete', ['imageId' => $img->id, 'postId' => $post->id ])  }}"
                                           class="col s1"><i class="material-icons small red-text">delete</i></a>
                                    @endforeach
                                </div>
                                <div>

                                </div>
                            @endif

                            <label>Novas imagens:</label>
                            <div class="row">
                                <div class="col m5">
                                    <div class="file-field input-field">
                                        <div class="btn red">
                                            <span><i class="material-icons medium">add</i></span>
                                            <input id="imagesInput" name="images[]" type="file" multiple>
                                        </div>
                                        <div class="file-path-wrapper text-darken-4">
                                            <input class="file-path validate " type="text"
                                                   placeholder="Adicione imagens">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error('images')
                            <span class="helper-text errors">{{ $message }}</span>
                            @enderror
                            <div class="row">
                                <h5 class="red-text">Imagens</h5>
                                <div id="image-preview">

                                </div>

                            </div>
                        </div>
                    </div>

                    <!--input dos arquivos -->
                    <div class="section">
                        <div class="files-preview section">
                            @if(isset($post))
                                <label>Arquivos já carregados:</label>
                                <div class="old_files row">
                                    <ul class="collection">
                                    @foreach($post->files as $file)
                                            <li class="collection-item">
                                                <a
                                                    href="{{ action('Admin\FileController@download', ['id' => $file->id]) }}">
                                                    {{ $file->name }}
                                                </a>
                                                <a href="{{ action('Admin\FileController@delete', ['id' => $file->id ]) }}">
                                                    <i class="material-icons small right red-text">delete</i>
                                                </a>
                                            </li>
                                    @endforeach
                                    </ul>
                                </div>
                                <div>

                                </div>
                            @endif

                            <label>Novos arquivos:</label>
                            <div class="row">
                                <div class="col m5">
                                    <div class="file-field input-field">
                                        <div class="btn blue">
                                            <span><i class="material-icons medium">add</i></span>
                                            <input id="filesInput" name="files[]" type="file" multiple>
                                        </div>
                                        <div class="file-path-wrapper text-darken-4">
                                            <input class="file-path validate" type="text" placeholder="Adicione arquivos">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error('files')
                            <span class="helper-text errors">{{ $message }}</span>
                            @enderror
                            <div class="row">
                                <h5 class="blue-text">Arquivos</h5>
                                <ul class="collection" id="files-preview">

                                </ul>

                            </div>
                        </div>
                    </div>


                    <!-- Select do projeto -->
                    <div class="input-field col s12 m6">
                        <select name="project" class="icons">
                            <option value=""
                                    @if(!isset($post))
                                    selected
                                    @endif
                            >
                                Nenhum projeto
                            </option>
                            @foreach($projects as $project)
                                <option
                                    value="{{ $project->id }}"
                                    data-icon="{{secure_asset('storage/' . $project->images->filepath )}}"
                                    @if(isset($post))
                                        @if($project->id == $post->project->id)
                                            selected
                                        @endif
                                    @endif
                                >
                                    {{ $project->title }}
                                </option>
                            @endforeach
                        </select>
                        <label>Projeto</label>
                    </div>

                    <!-- Botão de salvar -->
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

    <!-- Scripts do CKEditor-->
    <script src="{{ secure_asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ secure_asset('assets/admin/js/form_editor.js') }}"></script>
@endsection
