@extends('layouts.admin')


@section('admin-content')
<div class="col m9 push-m3">
	<div class="container">
		<div class="section">
			<form>
				
				{{ csrf_field() }}

				<div class="section">
					<label for="titulo">Título do projeto: </label>
					<input type="text" name="titulo" id="titulo">
				</div>

				<div class="section">
					<label for="content">Descrição do projeto: </label>
					<textarea name="editor1" id="editor1" rows="20"></textarea>
					<br/>
					<div class="divider"></div>
				</div>

				<div class="section">
					<label>Imagem Principal: </label>
					<div class="file-field input-field">
						<div class="btn">
							<span>Selecione...</span>
							<input type="file" multiple name="imagem_principal"/>
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text">
						</div>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>

@endsection