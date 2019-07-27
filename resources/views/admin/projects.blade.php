@extends('layouts.admin')

@section('admin-content')

    <div class="col m10 push-m2">
        <div class="row valign-wrapper">
            <div class="col m8 push-m1">
                <span class=""><h3>Projetos</h3></span>
            </div>
            <div class="col m3">
                <a href="{{ action('Admin\ProjectController@create') }}">
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
                        <th>ID</th>
                        <th>Título</th>
                        <th>Data de Criação</th>
                        <th>Última Modificação</th>
                        <th>Editar</th>
                        <!--
                        <th>Excluir</th>
                        -->
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td>
                                <a href="{{ action('Admin\ProjectController@edit', ['id' => $project->id ]) }}">
                                    <i class="material-icons">edit</i>
                                </a>
                            </td>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->title }}</td>
                            <td>{{ date('d/m/Y à\s h:i', strtotime($project->created_at)) }}</td>
                            <td>{{ date('d/m/Y à\s h:i', strtotime($project->updated_at)) }}</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection
