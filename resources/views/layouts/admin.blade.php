<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
  <title>Ângela Carreta</title>
  <!-- CSS  -->
  <link href="{{ secure_asset('assets/admin/css/admin-style.css')}}" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ secure_asset('assets/materialize/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body>
  <header>
    <ul id="dropdown1" class="dropdown-content">
      <li>
        <a href="#">
          Sair
        </a>
      </li>
    </ul>
    <div class="nav-wrapper navbar-fixed">

      <nav class="top-nav deep-orange lighten-1">
        <div class="left brand-logo ">
          <div class="valign-wrapper">
            <img  src="{{ secure_asset('assets/images/brand-logo.png') }}">
            <a href="{{ action('Home\PostController@index') }}" class="black-text" style="margin-left: 5px"> - Área Administrativa</a>
          </div>
        </div>

        <!--
        <ul class="right">
          <div class="valign-wrapper">
            <li>
              <a class="dropdown-trigger" href="#!" data-target="dropdown1">
                <i class="material-icons left">account_circle</i>
                Helison
                <i class="material-icons right">arrow_drop_down</i>
              </a>
            </li>
          </div>
        </ul>
        -->
      </nav>
    </div>
  </header>

  <main>
    <div class="row">
      <div class="col m2 blue-grey darken-4 left-nav">
        <ul >
          <li><a class="white-text" href="{{ action('Admin\PostController@index')}}"><i class="material-icons left">description</i>Publicações</a></li>
          <br/>
          <li><a class="white-text" href="{{ action('Admin\ProjectController@index') }}"><i class="material-icons left">school</i>Projetos</a></li>
          <br/>
          <li><a class="white-text" href="{{ action('Admin\TagController@index') }}"><i class="material-icons left">bookmark</i>Categorias</a></li>
          <br/>
          <li><a class="white-text" href="{{ action('Admin\AuthorController@index') }}"><i class="material-icons left">person</i>Usuários</a></li>
        </ul>
      </div>


      <!--

      INÍCIO DO CONTEÚDO DINÂMICO
      ***NOTE: Todo o conteúdo dinâmico deve ter uma tag div que seja pai de todas com a class="col m10 push-m3"
      -->

    @yield('admin-content')

    <!--
    FIM DO CONTEÚDO DINÂMICO
    -->
</div>
</main>

<!--
<footer class="light-blue darken-1 page-footer">
  <div class="row">
    <div class="col s9 push-m3">
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
  </div>
</footer>
-->

<!--  Scripts-->
<script src="{{ secure_asset('assets/materialize/materialize.js') }}"></script>
</body>

</html>
