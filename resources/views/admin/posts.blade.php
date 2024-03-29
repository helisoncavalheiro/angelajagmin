@extends('layouts.admin')

@section('admin-content')

    <div class="col m10 push-m2">
        <div class="row valign-wrapper">
            <div class="col m8 offset-m1">
                <span class=""><h3>Publicações</h3></span>
            </div>
            <div class="col m3">
                <a href="{{ action('Admin\PostController@create') }}">
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
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Data de Criação</th>
                        <th>Última Modificação</th>
                        <th>Excluir</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $p)
                        <tr>
                            <td>
                                <a href="{{ action('Admin\PostController@edit', ['id' => $p->id ]) }}">
                                    <i class="material-icons">edit</i>
                                </a>
                            </td>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->title }}</td>
                            <td>{{ $p->author }}</td>
                            <td>{{ date('d/m/Y à\s H:i', strtotime($p->created_at ))}}</td>
                            <td>{{ date('d/m/Y à\s H:i', strtotime($p->updated_at )) }}</td>
                            <td>
                                <form id="deleteForm" method="POST" action="{{ action("Admin\PostController@destroy", ["id" => $p->id])  }}">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit">
                                        <i class="material-icons text-red">delete</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
