@extends('layouts.home')

@section('content')

<?php
$i = 0;
?>
<main>
    <!-- Seção de posts -->
    <div class="section">
        <div class="row">
            <div class="col m7 offset-m1 ">
                <!-- Linha que contém as duas colunas (posts e sidebar) -->
                <?php while($i<10){ ?>
                <div class="card row show-on-medium-and-up hide-on-small-only hoverable">
                    <!-- Coluna dos posts para telas grandes -->
                    <a href="#">
                        <div class="card-noticia col m12">
                            <div class="col m6">
                                <img class="img-noticia" src="images/sample.jpg">
                            </div>
                            <div class="col m6">
                                <div class="conteudo-noticia">
                                    <span><b>Título da Publicação</b></span>
                                    <p><i class="material-icons left small">access_time</i>Atualizado 2 dias atrás</p>
                                    <p class="">I am a very simple card. I am good at containing small bits of information. I
                                        am
                                        convenient because I require little markup to use effectively.</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php $i=$i+1; } $i=0;?>
            </div>
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
                </div>
            </div>
        </div>

        <!-- Coluna dos posts para telas pequenas
                Não colocar nenhuma definição de colunas
                A barra lateral fica bugada
                -->
        <div class="container show-on-small hide-on-med-and-up">
            <div class="row show-on-small">
                <?php while($i<10){?>
                <div class="col s12 show-on-small">
                    <div class="row">
                        <!-- Card do post -->
                        <div class="card medium col m8 offset-m1">
                            <div class="card-image">
                                <img src="public/images/sample.jpg">
                            </div>
                            <div class="card-content">
                                <span class="card-title">Card Title</span>
                                <p>I am a very simple card. I am good at containing small bits of information. I am
                                    convenient because I require little markup to use effectively.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i = $i+1; }?>
            </div>
        </div>
    </div>
</main>

@endsection