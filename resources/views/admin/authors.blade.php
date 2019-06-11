@extends('layouts.admin')

@section('admin-content')

<div class="col m10 push-m2">
	<div class="row valign-wrapper">
		<div class="col m8 offset-m1">
			<span class=""><h3>Autores</h3></span>
		</div>
		<div class="col m3">
			<a href="{{ action('Admin\AuthorController@create') }}">
				<button class="center-align btn-floating btn-large waves-effect waves-light green">
					<i class="material-icons">add</i>
				</button>
			</a>
		</div>
	</div>

	<div class="row">
		<div class="col m10 offset-m1">
			<table>
				<thead>
					<tr>
						<th>Editar</th>
						<th>ID</th>
						<th>Nome</th>
						<th>Email</th>
						<th>Data de Criação</th>
						<th>Última Modificação</th>
					</tr>
				</thead>
				<tbody>
					@foreach($author as $a)
					<tr>
						<td>
							<a href="{{ action('Admin\AuthorController@edit', ['id' => $a->id ]) }}">
								<i class="material-icons">edit</i>
							</a>
						</td>
            <td>{{ $a->id }}</td>
						<td>{{ $a->name }}</td>
						<td>{{ $a->email }}</td>
						<td>{{ $a->created_at }}</td>
						<td>{{ $a->updated_at }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
