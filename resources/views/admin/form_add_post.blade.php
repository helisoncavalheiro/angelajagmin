@extends('layouts.admin')

@section('admin-content')
<div class="col m9 push-m3">
  <div class="container">
    <div class="section">
      <form method="POST" enctype="multipart/form-data" action="{{ action('Admin\PostController@store') }}">

      {{ csrf_field() }}

        <!-- Input do título -->
        <div class="section">
          <label for="titulo" class="header">Título: </label>
          <input
          id="titulo"
          type="text"
          name="title"
          placeholder="Insira um título"
          class="tooltipped validate"
          data-position="bottom"
          data-tooltip="O título fica em negrito por padrão"
          />
          @error('title')
          <span class="helper-text errors">{{ $message }}</span>
          @enderror
        </div>


        <!--input da imagem principal -->
        <div class="section">
          <label>Imagens: </label>
          <div class="file-field input-field">
            <div class="btn light-blue lighten-1">
              <span>Selecione...</span>
              <input id="images" type="file" name="images[]" multiple="" />
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" placeholder="Selecione alguma imagem..." type="text">
            </div>
          </div>
          @error('images')
            <span class="helper-text errors">{{ $message }}</span>
          @enderror
          @error('images.*')
            <span class="helper-text errors">{{ $message }}</span>
          @enderror
        </div>


        <!--editor de texto -->
        <div class="section">
          <label for="content">Conteúdo: </label>
          <textarea name="content" id="content" rows="20"></textarea>
          <br/>
          <div class="divider"></div>
          @error('content')
            <span class="helper-text errors">{{ $message }}</span>
          @enderror
        </div>


        <!-- input dos arquivos
        <div class="section">
          <label>Arquivos:</label>
          <div class="file-field input-field">
            <div class="btn light-blue lighten-1">
              <span>Selecione...</span>
              <input type="file" multiple="" name="files[]">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Selecione um ou mais arquivos">
            </div>
          </div>
          <br />
          <div class="divider"></div>
        </div>
        -->


        <!--Status do post -->
        <div class="row section">
          <div class="switch col s4 left">
            <label class="red-text">Inativo</label>
              <label>
                <input class="green" type="checkbox" name="status">
                <span class="lever"></span>
              </label>
            <label class="green-text">Ativo</label>
          </div>
        </div>

        <!-- Botão de salvar -->
        <div class="row section">
            <button class="col s2 offset-s5 btn waves-effect waves-light green" type="submit" name="action">
              <i class="material-icons right">send</i>
              Salvar
            </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Scripts do CKEditor-->
<script src="{{ secure_asset('assets/ckeditor/ckeditor.js') }}"></script>
<script src="{{ secure_asset('assets/admin/js/form_editor.js') }}"></script>
@endsection
