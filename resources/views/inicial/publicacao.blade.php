@extends('layouts.home')

@section('content')

<main class="section">

	<div class="row">
		<span class="header col s10 offset-s1">
			<h1 class="center-align">Título da Publicação</h1>
		</span>
	</div>
	<div class="row center-align">
		<div class="col m2 ">
			<div class="card-panel">
				<span>
					<h6><b>Acesso Rápido</b></h6>
				</span>
				<ul class="card-content">
					<li><a href="#">Arquivo 1</a><i class="material-icons right" >file_download</i></li>
					<li><a href="#">Arquivo 2</a><i class="material-icons right" >file_download</i></li>
					<li><a href="#">Arquivo 3</a><i class="material-icons right" >file_download</i></li>
					<li><a href="#">Arquivo 4</a><i class="material-icons right" >file_download</i></li>
					<li><a href="#">Arquivo 5</a><i class="material-icons right" >file_download</i></li>
				</ul>
			</div>

		</div>

		<div class="col s12 m7 ">
			<div class="row">
				<div class="col s10 offset-s1">
					<img class="col s12 responsive" src="images/sample.jpg">
				</div>
			</div>

			<div class="row">
				<div class="card-panel col s12">
					<p class="publicacao-texto">
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Error maiores cupiditate neque placeat eum
						magnam
						sapiente. Magnam aliquam atque officiis natus ullam minus earum veritatis doloribus reprehenderit
						incidunt.
						Placeat, tenetur!
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus aperiam, iusto molestiae earum
						doloribus
						excepturi quisquam velit provident animi, ullam molestias hic iste esse nemo voluptates reprehenderit
						repellendus libero! Doloremque.
						Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde consectetur, animi libero ab tempore
						eaque
						laboriosam tempora ea mollitia assumenda non quae sed perspiciatis, voluptates amet natus laborum beatae
						temporibus?
					</p>
				</div>
			</div>
		</div>

		<div class="col m3 hide-on-med-and-down">
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
</main>

@endsection