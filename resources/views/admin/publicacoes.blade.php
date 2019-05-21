@extends('layouts.admin')

@section('admin-content')

<div class="col m10 push-m2">
	<div class="row valign-wrapper">
		<div class="col m8 push-m1">
			<span class=""><h1>Publicações</h1></span>
		</div>
		<div class="col m3">
			<a href="{{ action('Admin\PostController@create') }}">
				<button class="center-align btn-large waves-effect waves-light">
					<i></i>
					Nova
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
						<th>Autor</th>
						<th>Data de Criação</th>
						<th>Última Modificação</th>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $p)
					<tr>
						<td>{{ $p->id }}</td>
						<td>{{ $p->titulo }}</td>
						<td>{{ $p->autor }}</td>
						<td>{{ $p->created_at }}</td>
						<td>{{ $p->updated_at }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection