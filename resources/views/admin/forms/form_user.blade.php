@extends('layouts.admin')

@section('admin-content')

<link rel="stylesheet" type="text/css" href="{{ secure_asset('assets/admin/css/login.css')}}">

<div class="col m10 push-m2">
  <main>
    <center>
      <div class="section"></div>

      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
          <h5 class="indigo-text">Novo Usuário</h5>
          <form class="col s12" method="post" action="{{ action('Admin\AuthorController@store') }}">
            {{ csrf_field() }}
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>
            <div class='row'>
              <div class='input-field col s12'>
                <input type='text' name='name' id='email' />
                <label for='email'>Nome</label>
              </div>
            </div>
            @error('name')
              <span class="helper-text errors">{{ $message }}</span>
            @enderror
            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='email' name='email' id='email' />
                <label for='email'>E-mail</label>
              </div>
            </div>
            @error('email')
              <span class="helper-text errors">{{ $message }}</span>
            @enderror

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='password' id='password' />
                <label for='password'>Senha</label>
              </div>
            </div>
            @error('password')
              <span class="helper-text errors">{{ $message }}</span>
            @enderror

            <div class="row">
              <div class="input-field col s12">
                <select name="role">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="1">Administrador</option>
                  <option value="2">Autor</option>
                  <option value="3">Bolsista</option>
                  <label>Selecione o tipo de usuário</label>
                </select>
              </div>
            </div>
            @error('role')
              <span class="helper-text errors">{{ $message }}</span>
            @enderror
            <br/>
            <center>
              <div class='row'>
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Criar Conta</button>
              </div>
              <div class="row">
              </div>
            </center>
          </form>
        </div>
      </div>
    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>
</div>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="{{ secure_asset('assets/materialize/materialize.js') }}"></script>
  <script>

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
  });

  </script>

  @endsection
