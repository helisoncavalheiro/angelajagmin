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
                    <div class="row valign-wrapper">
                        <!-- Última atualização do post -->
                        <p class="col s4 post-update valign-wrapper pull-s2"><i class="material-icons left tiny">access_time</i>Publicado
                            em {{ date('d/m/Y à\s H:i', strtotime($post->created_at ))  }}</p>

                        <!--
                        Autor do post
                        -->
                        <p class="col s4 pull-s4 post-author valign-wrapper">
                            <i class="material-icons left medium">account_circle</i>
                            por Ângela Jagmin Carretta
                        </p>
                    </div>


                    <div class="row">
                        @if(isset($post->project))
                            <a href="{{ action('Home\ProjectController@showPostsFromProject', ['id' => $post->project->id]) }}">
                                <div class="chip waves-effect waves-light">
                                    <img
                                        src="{{ secure_asset('storage/' . $post->project->images->filepath) }}"
                                    >
                                    {{ $post->project->title }}
                                </div>
                            </a>
                        @endif
                        @if(isset($post->tags))
                            @foreach($post->tags as $tag)
                                <a href="{{ action('Home\TagController@showPostsByTag', ['id' => $tag->id]) }}">
                                    <div
                                        class="chip waves-effect waves-light">
                                        <div class="valign-wrapper">
                                            <i class="material-icons tiny left">label</i>
                                            {{ $tag->name}}
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>

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
                    <div class="section">
                        <div class="row">
                            <h5 class="col s10 offset-m1 red-text">Imagens e vídeos:</h5>
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
                                        <a class="carousel-item" href="#!">
                                            <img class="materialboxed responsive-img"
                                                 src="{{ secure_asset('storage/'.$i->filepath) }}">
                                        </a>
                                    </div>
                                @endforeach
                                @if(isset($post->videos))
                                    @foreach($post->videos as $video)
                                        <?php
                                        $videoId = substr($video->url, strpos($video->url, "?v=") + 3);
                                        ?>
                                        <div class="col s10">
                                            <a class="carousel-item video-container" href="{{ $video->url }}">
                                                <iframe width="853" height="480"
                                                        src="//www.youtube.com/embed/{{ $videoId }}?rel=0"
                                                        frameborder="0" allowfullscreen showinfo="1"
                                                        rel="0">
                                                </iframe>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
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
        </div>
    </main>
    <!-- Scripts -->
    <script src="{{ secure_asset('assets/home/js/script.js') }}"></script>
@endsection
