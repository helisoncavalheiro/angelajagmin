@extends('layouts.admin')

@section('admin-content')
<div class="col m9 push-m3">
  <div class="container">
    <div class="section">
      <form id="form" method="POST" enctype="multipart/form-data" action="{{ action('Admin\PostController@update', ['id' => $post->id]) }}">
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

        <!--editor de texto -->
        <div class="section">
          <label for="content">Conteúdo: </label>
          <textarea name="content" value="{{ $post->content }}" id="content" rows="20">
            <!--&lt;&gt;-->
            {{$post->content}}
            <!--&lt;&gt;-->
          </textarea>
          <br/>
          <div class="divider"></div>
        </div>

        <!--input da imagem principal -->
        <div class="section">
          <label>Imagens </label>
          <div class="images-preview section">
            <label>Imagens já carregadas:</label>
            <div class="old_images row">
              @foreach($post->images as $img)
              <div class="col s3">
                <input hidden name="deleteImage{{ $img->id  }}" value="{{ $img->id }}"/>
                <img src="{{ secure_asset('storage/' . $img->filepath) }}" class="responsive-img" />
              </div>
              @endforeach
            </div>
            <label>Novas imagens:</label>
            <div class="new_images row">

            </div>
          </div>
        </div>

        <div class="row section">
          <div class="switch col s4 left">
            <label class="red-text">Inativo</label>
            <label>
              <input class="green" type="checkbox" name="status"
              <?php
              //caso estiver ativo, torna o checkbox checked
              if($post->status == "on"){
                echo 'checked';
              }
              ?>
              >
              <span class="lever"></span>
            </label>
            <label class="green-text">Ativo</label>
          </div>
        </div>

        <!-- Botão de salvar -->
        <div class="row section">
          <button class="col s2 offset-s5 btn waves-effect waves-light green" type="submit">
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
