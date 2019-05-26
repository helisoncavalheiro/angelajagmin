@extends('layouts.home')

@section('content')
<link href="{{ asset('assets/home/css/post.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
<script src="{{ asset('assets/home/js/post.js') }}" type="text/javascript" rel="script"></script>
<main class="section">

	<div class="row">
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

		<div class="col s12 m7 ">
			<div class="card-panel">
				<div class="row">
					<span class="header col s12">
						<h1 class="left-align post-title">{{ $post->title }}</h1>
					</span>
				</div>
				<div class="row">
					<!-- Última atualização do post -->
					<p class="col s3 post-update valign-wrapper"><i class="material-icons left tiny">access_time</i> {{ $post->updated_at  }}</p>
					<!--Autor do post -->
					<p class="col s5pp post-author valign-wrapper"><i class="material-icons left tiny">account_circle</i> Ângela Jagmin Carretta </p>
				</div>
				<div class="row">
					<div class="col s12">
						<span class="publicacao-texto">
							<?php echo $post->content;  ?>
						</span>
					</div>
				</div>

				<div class="row valign-wrapper">

						<i class="deep-orange lighten-1 material-icons medium left">chevron_left</i>

					<div class="carousel carousel-slider">
						@foreach($post->images as $i)
						<div class="col s10">
							<a class="carousel-item" href="#one!">
								<img src="{{ asset($i->filepath) }}">
							</a>
						</div>
						@endforeach
					</div>
					<div class="col s1 deep-orange lighten-1 circle slider-button valign-wrapper">
						<i class="left material-icons medium">chevron_right</i>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@endsection