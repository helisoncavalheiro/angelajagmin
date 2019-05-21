@extends('layouts.admin')

@section('admin-content')
<div class="col m9 push-m3">
  <div class="container">
    <div class="section">
      <form method="POST" action="{{ action('Admin\PublicacaoController@store') }}">

      {{ csrf_field() }}

        <!-- Input do título -->
        <div class="section">
          <label for="titulo" class="header">Título: </label>
          <input
          id="titulo"
          type="text"
          name="titulo"
          placeholder="Insira um título"
          class="tooltipped"
          data-position="bottom"
          data-tooltip="O título fica em negrito por padrão"
          />
        </div>


        <!--input da imagem principal -->
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


        <!--editor de texto -->
        <div class="section">
          <label for="content">Conteúdo: </label>
          <textarea name="editor1" id="editor1" rows="20"></textarea>
          <br/>
          <div class="divider"></div>
        </div>


        <!-- input dos arquivos-->
        <div class="section">
          <label>Arquivos:</label>
          <div class="file-field input-field">
            <div class="btn">
              <span>Selecione...</span>
              <input type="file" multiple name="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Selecione um ou mais arquivos">
            </div>
          </div>
          <br />
          <div class="divider"></div>
        </div>
        <!--opções save -->
        <div class="row section">
          <div class="switch col s3">
            <label>
              Ativo
              <input type="checkbox" name="situacao">
              <span class="lever"></span>
            </label>
          </div>
          <button class="col s2 btn waves-effect waves-light" type="submit" name="action">Salvar
            <i class="material-icons right">send</i>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection