@extends('layouts.admin')


@section('admin-content')
<div class="col m9 push-m3">
	<div class="container">
		<div class="section">
			<form method="POST" enctype="multipart/form-data" action="{{ action('Admin\ProjectController@update') }}">
				
				{{ csrf_field() }}

				<div class="section">
					<label for="titulo">Título do projeto: </label>
					<input type="text" name="titulo" id="titulo" value="{{ $projeto->titulo }}">
				</div>

				<div class="section">
					<label for="editor1">Descrição do projeto: </label>
					<textarea name="descricao" id="editor1" rows="20" value="{{ $projeto->descricao }}"></textarea>
					<br/>
					<div class="divider"></div>
				</div>

				<div class="section">
					<label>Imagem: </label>
					<div class="file-field input-field">				
						<div class="btn">
							<span>Selecione...</span>
							<input type="file" name="imagem">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text">
						</div>
					</div>
				</div>
				<div class="row section">
					<div class="switch col s3">
						<label>
							Ativo
							<input type="checkbox" name="situacao">
							<span class="lever"></span>
						</label>
					</div>
					<button class="col s2 btn waves-effect waves-light" type="submit">Salvar
						<i class="material-icons right">send</i>
					</button>
				</div>

			</form>
		</div>
	</div>
</div>

@endsection