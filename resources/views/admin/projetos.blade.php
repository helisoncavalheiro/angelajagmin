@extends('layouts.admin')

@section('admin-content')

<div class="col m10 push-m2">
	<div class="row valign-wrapper">
		<div class="col m8 push-m1">
			<span class=""><h1>Projetos</h1></span>
		</div>
		<div class="col m3">
			<a href="{{ action('Admin\ProjetoController@create') }}">
				<button class="center-align btn-large waves-effect waves-light">
					<i></i>
					Novo
				</button>
			</a>
		</div>
	</div>

	<div class="row">
		<div class="col m10 offset-m1">
			<table>
				<thead>
					<tr>
						<th>ID</th>
						<th>Título</th>
						<th>Data de Criação</th>
						<th>Última Modificação</th>
						<!--
						<th>Editar</th>
						<th>Excluir</th>
						-->
					</tr>
				</thead>
				
				<tbody>
					@foreach($projetos as $projeto)
					<tr>
						<td><a href="#" >{{ $projeto->id }}</a></td>
						<td>{{ $projeto->titulo }}</td>
						<td>{{ $projeto->created_at }}</td>
						<td>{{ $projeto->updated_at }}</td>
					</tr>
					@endforeach
				</tbody>
				
			</table>
		</div>
	</div>
</div>

@endsection