@extends('layouts.home')

@section('content')
    <link href="{{ secure_asset('assets/home/css/home.css') }}" type="text/css" rel="stylesheet"
          media="screen,projection"/>
    <main>
        <!-- Seção de posts -->
        <div class="section">
            @if(isset($filter))
                <div class="row">
                    <div class="col m7 offset-m1">
                        <div class="row">
                            <span>Filtrando por:</span>

                            @if($filter == "tag")
                                <a href="{{ action('Home\TagController@showPostsByTag', ['id' => $tagFilter->id]) }}"
                                   class="chip waves-effect waves-orange">
                                    <div class="valign-wrapper">
                                        <i class="material-icons tiny left">label</i>
                                        {{ $tagFilter->name}}
                                    </div>
                                </a>

                            @else
                                <a class="" id="projeto"
                                   href="{{ action('Home\ProjectController@showPostsFromProject', ['id' => $projectFilter->id]) }}">
                                    <div class="chip col waves-effect waves-light">
                                        <img
                                            src="{{ secure_asset('storage/' . $projectFilter->images->filepath) }}">
                                        {{ $projectFilter->title }}
                                    </div>
                                </a>
                            @endif

                        </div>
                    </div>
                </div>
        </div>
    @endif
    <!-- Linha que contém as duas colunas (posts e mais clicadas) -->
        <div class="row">
            <!-- Coluna dos posts para telas grandes -->
            <div class="col m7 offset-m1 ">
                <!-- Para cada post no array de posts -->
            @foreach($posts as $post)
                <!-- Card do post -->
                    <div class="section card row show-on-medium-and-up hide-on-small-only hoverable">
                        <!-- Link que direciona para a página do post-->
                        <a href="{{ action('Home\PostController@show', ["id" => $post->id]) }}">
                            <!--Card da notícia (adiciona margem)-->
                            <div class="card-noticia col m12">

                                <!-- Linha do título -->
                                <div class="row">
                                    <div class="post-header">
                                        <!-- Título da notícia -->
                                        <span class="post-title">{{ $post->title }}</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Última atualização do post -->
                                    <p class="col s5 post-update valign-wrapper "><i
                                            class="material-icons left small">access_time</i>Publicado
                                        em {{ date('d/m/Y à\s H:i', strtotime($post->created_at ))  }}</p>

                                    <!--Autor do post -->
                                    <p class="col s5 post-author valign-wrapper"><i
                                            class="material-icons left small">account_circle</i>por Ângela Jagmin
                                        Carretta </p>
                                </div>

                                <!-- Linha da imagem e do resumo -->
                                <div class="row valign-wrapper section">

                                    <!--Coluna da imagem da notícia-->
                                    <div class="col m6">
                                        <img class="responsive-img"
                                             src="{{ secure_asset('storage/' . $post->images->first()->filepath)  }}">
                                    </div>
                                    <!--Fim da coluna da imagem da notícia-->

                                    <!--Coluna do resumo da notícia-->
                                    <div class="col m6">
                                        <div class="post-resumo">
                                            <!--Resumo da notícia-->
                                            <span class="post-content">
                                                    <?php echo $post->abstract; ?>
                                                </span>
                                        </div>
                                    </div>
                                    <!--Fim da coluna do resumo da notícia-->
                                </div>
                                @if($post->project != null || count($post->tags) > 0)
                                    <div class="chips-row">
                                        <div class="row">
                                            @if(isset($post->project))
                                                <a id="projeto"
                                                   href="{{ action('Home\ProjectController@showPostsFromProject', ['id' => $post->project->id]) }}">
                                                    <div class="chip col waves-effect waves-light">
                                                        <img
                                                            src="{{ secure_asset('storage/' . $post->project->images->filepath) }}">
                                                        {{ $post->project->title }}
                                                    </div>
                                                </a>
                                            @endif
                                            @if(count($post->tags) > 0)
                                                @foreach($post->tags as $tag)
                                                    <a href="{{ action('Home\TagController@showPostsByTag', ['id' => $tag->id]) }}"
                                                       class="chip waves-effect waves-orange">
                                                        <div class="valign-wrapper">
                                                            <i class="material-icons tiny left">label</i>
                                                            {{ $tag->name}}
                                                        </div>
                                                    </a>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!--Fim da linha da imagem e do resumo -->
                        </a>
                        <!-- Fim do card da notícia -->

                    </div>
                @endforeach
            </div>
            <!-- Fim da coluna dos posts para telas grandes -->
            <!--
            <div class="col m4 hide-on-med-and-down">
                <div class="card-panel">
                    <span class="card-title">
                        <h4>Mais Clicadas:</h4>
                    </span>

                    <div class="card-content row">
                        <ul class="col s10 push-m2">
                            <li><a href="#">Jogos para ensino da matemática</a></li>
                            <br>
                            <li><a href="#">Trabalhos publicados no CONGREGA</a></li>
                            <br>
                            <li><a href="#">Test 1 </a></li>
                            <br>
                            <li><a href="#">Test 1 </a></li>
                        </ul>
                    </div>
                    -->
        </div>
        </div>
        </div>

        <!-- Coluna dos posts para telas pequenas
                Não colocar nenhuma definição de colunas
                A barra lateral fica bugada
                -->
        <div class="container show-on-small hide-on-med-and-up">
            <div class="row show-on-small">
                @foreach($posts as $post)
                    <div class="col s12 show-on-small">
                        <div class="row">
                            <!-- Card do post -->
                            <div class="card medium col m8 offset-m1">
                                <div class="card-image">
                                    <img class="responsive-img" src="">
                                </div>
                                <div class="card-content">
                                    <span class="card-title"></span>
                                    <span>
                                    <?php echo $post->content ?>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </main>
    <!-- Scripts da página home -->
    <script src="{{ secure_asset('assets/home/js/script.js') }}"></script>
@endsection
