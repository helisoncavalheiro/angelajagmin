@extends('layouts.admin')

@section('admin-content')
<div class="col m9 push-m3">
  <div class="container">
    <div class="section">
      <form method="POST" enctype="multipart/form-data" action="{{ action('Admin\PostController@update', ['id' => $post->id]) }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <!-- Input do título -->
        <div class="section">
          <label for="titulo" class="header">Título: </label>
          <input
          value="{{ $post->title }}"
          id="titulo"
          type="text"
          name="title"
          placeholder="Insira um título"
          class="tooltipped"
          data-position="bottom"
          data-tooltip="O título fica em negrito por padrão"
          />
          @error('title')
          <span class="helper-text errors">{{ $message }}</span>
          @enderror
        </div>


        <!--input da imagem principal -->
        <div class="section">
          <label>Imagem: </label>
          <div class="file-field input-field">
            <div class="btn light-blue lighten-1">
              <span>Selecione...</span>
              <input id="images" type="file" name="images[]" multiple />
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
            @error('images')
            <span class="helper-text errors">{{ $message }}</span>
            @enderror
            @error('images.*')
            <span class="helper-text errors">{{ $message }}</span>
            @enderror
            <br>
            <br>
            <div class="images-preview row">
          </div>
        </div>


        <!--editor de texto -->
        <div class="section">
          <label for="content">Conteúdo: </label>
          <textarea name="content" value="{{ $post->content }}" id="content" rows="20">
            &lt;p&gt;{{$post->content}}&lt;/p&gt;
          </textarea>
          <br/>
          <div class="divider"></div>
        </div>


        <!-- input dos arquivos
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
-->
<!--Status do post
        <div class="row section">
          <div class="switch col s4 left">
            <label class="red-text">Inativo</label>
              <input class="green" type="checkbox" name="status" checked
              <?php
              //caso estiver ativo, torna o checkbox checked
              //if($post->status == "on"){
                //echo 'checked';
              //}
              ?>
              >
              <span class="lever"></span>
            <label class="green-text">Ativo</label>
          </div>
        </div>
-->
        <!-- Botão de salvar -->
        <div class="row section">
          <button id="submit" class="col s2 offset-s5 btn waves-effect waves-light green" type="submit" name="action">
            <i class="material-icons right">send</i>
            Salvar
          </button>
        </div>

        <!-- Fim do formulário -->
      </form>
    </div>
  </div>
</div>
<script src="{{ secure_asset('assets/ckeditor/ckeditor.js') }}"></script>
<script src="{{ secure_asset('assets/admin/js/form_editor.js') }}"></script>
@endsection
