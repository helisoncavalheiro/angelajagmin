@extends('layouts.home')

@section('content')
<link href="{{ secure_asset('assets/home/css/post.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
<script src="{{ secure_asset('assets/home/js/post.js') }}" type="text/javascript" rel="script"></script>
<main class="section">

	<div class="row">
		<!--
		<div class="col m2 show-on-medium-and-up hide-on-small-and-down">
			<div class="card-panel">
				<span class="">
					<h6 class="left-align"><b>Arquivos para Download</b></h6>
				</span>
				<ul class="card-content">
					<li class="valign-wrapper"><a href="#">Arquivo 1</a><i class="material-icons right" >file_download</i></li>
					<li class="valign-wrapper"><a href="#">Arquivo 2</a><i class="material-icons right" >file_download</i></li>
					<li class="valign-wrapper"><a href="#">Arquivo 3</a><i class="material-icons right" >file_download</i></li>
					<li class="valign-wrapper"><a href="#">Arquivo 4</a><i class="material-icons right" >file_download</i></li>
					<li class="valign-wrapper"><a href="#">Arquivo 5</a><i class="material-icons right" >file_download</i></li>
				</ul>
			</div>
		</div>
		-->
		<div class="col s12 m7 push-m2 ">
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
                    <!--Autor do post -->
					<p class="col s5 post-author valign-wrapper"><i class="material-icons left tiny">account_circle</i> por Ângela Jagmin Carretta</p>
				</div>
				<div class="row">
					<div class="col s12">
						<span class="publicacao-texto">
							<?php echo $post->content;  ?>
						</span>
					</div>
				</div>

				<!-- Carrossel de imagens -->
				<div class="row">
					<h5 class="col s10 offset-m1">Galeria de imagens:</h5>
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
