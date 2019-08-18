@extends('layouts.admin')

@section('admin-content')
    <div class="col m9 push-m3">

        <form
            method="post"
            enctype="multipart/form-data"
            @if(isset($tag))
            action="{{ action('Admin\TagController@update', ['id' => $tag->id]) }}"
            @else
            action="{{ action('Admin\TagController@store') }}"
            @endif
        >
            {{ csrf_field() }}

            @if(isset($tag))
                {{ method_field('PATCH') }}
            @endif

            <div class="section">
                <div class="row">
                    <div class="input-field col s6">
                        <input
                            placeholder="Nome da categoria"
                            id="name"
                            name="name"
                            type="text"
                            class="validate"
                            @if(isset($tag))
                            value="{{ $tag->name }}"
                            @endif
                        >
                        <label for="name header">Nome</label>
                    </div>
                </div>
            </div>
            <div class="row section">
                <button id="submit" class="col s2 btn waves-effect waves-light green" type="submit"
                        name="action">
                    <i class="material-icons right">send</i>
                    Salvar
                </button>
            </div>
        </form>

    </div>
@endsection
