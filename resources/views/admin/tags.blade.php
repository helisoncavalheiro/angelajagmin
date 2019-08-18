@extends('layouts.admin')

@section('admin-content')
    <div class="col m9 push-m3">
        <div class="row valign-wrapper">
            <div class="col m8">
                <h3>Categorias</h3>
            </div>
            <div class="col m3">
                <a href="{{ action('Admin\TagController@create') }}">
                    <button class="center-align btn-floating btn-large waves-effect waves-light green">
                        <i class="material-icons">add</i>
                    </button>
                </a>
            </div>
        </div>
        <div class="row">
            @foreach($tags as $tag)
                <div class="col s12 m3">
                    <div class="card grey lighten-5">
                        <div class="card-content black-text">
                            <span class="card-title">{{ $tag->name }}</span>
                            <p class="valign-wrapper">
                                <i class="material-icons tiny left">access_time</i>Criado em {{ date('d/m/Y à\s H:i', strtotime($tag->created_at ))}}
                            </p>
                        </div>
                        <div class="card-action">
                            <div class="row">
                                <div class="col s6">
                                    <a class="blue-text valign-wrapper" href="{{ action('Admin\TagController@edit', ['id' => $tag->id]) }}"><i class="material-icons tiny left">edit</i>Editar</a>
                                </div>
                                <div class="col s6">
                                    <a class="red-text valign-wrapper" href="{{ action('Admin\TagController@deleteTag', ['id' => $tag->id]) }}"><i class="material-icons tiny left">delete</i>Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

@endsection
