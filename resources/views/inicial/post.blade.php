@extends('layouts.home')

@section('content')
    <link href="{{ secure_asset('assets/home/css/post.css') }}" type="text/css" rel="stylesheet"
          media="screen,projection"/>
    <script src="{{ secure_asset('assets/home/js/post.js') }}" type="text/javascript" rel="script"></script>
    <main class="section">

        <div class="row">
            <div class="col s12 m8 push-m2">
                <div class="card-panel">
                    <div class="row">
					<span class="header col s12">
						<h1 class="left-align post-title">{{ $post->title }}</h1>
					</span>
                    </div>
                    <div class="row">
                    <!-- Última atualização do post
					<p class="col s5 post-update valign-wrapper"><i class="material-icons left tiny">access_time</i>Atualizado em {{ $post->updated_at  }}</p>
					-->
                        <!--
                        Autor do post
                        -->
                        <p class="col s5 post-author valign-wrapper">
                            <i class="material-icons left tiny">account_circle</i>
                            por Ângela Jagmin Carretta
                        </p>
                    </div>

                    @if(isset($post->project))
                        <div class="row">
                            <a href="{{ action('Home\ProjectController@showPostsFromProject', ['id' => $post->project->id]) }}">
                                <div class="chip blue darken-1 waves-effect waves-light">
                                    <img
                                        src="{{ secure_asset('storage/' . $post->project->images->filepath) }}"
                                    >
                                    {{ $post->project->title }}
                                </div>
                            </a>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col s12">
						<span class="publicacao-texto">
							<?php echo $post->content;  ?>
						</span>
                        </div>
                    </div>
                    <!-- Seção de arquivos carregados -->
                    @if(count($post->files) > 0 )
                        <div class="section">
                            <div class="row">
                                <h5 class="left-align col s10 offset-m1 blue-text">Arquivos para Download:</h5>
                            </div>
                            <div class="row">
                                <ul class="collection col s10 offset-m1">
                                    @foreach($post->files as $file)
                                        <li class="valign-wrapper collection-item">
                                            {{ $file->name }}
                                            <a href="{{ action('Home\FileController@download', ['id' => $file->id])  }}">
                                                <i class="material-icons small right">file_download</i>
                                            </a>

                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                <!-- Carrossel de imagens -->
                    <div class="row">
                        <h5 class="col s10 offset-m1 red-text">Galeria de imagens:</h5>
                    </div>
                    <div class="row valign-wrapper">
                        <div class="col s1">
                            <a href="#!" id="slider-button-left">
                                <i class="material-icons medium right deep-orange-text lighten-1">chevron_left</i>
                            </a>
                        </div>
                        <div class="col s10 carousel carousel-slider">
                            @foreach($post->images as $i)
                                <div class="col s10">
                                    <a class="carousel-item" href="#one!">
                                        <img src="{{ secure_asset('storage/'.$i->filepath) }}">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="col s1">
                            <a href="#!" id="slider-button-right">
                                <i class="material-icons medium left deep-orange-text lighten-1">chevron_right</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
