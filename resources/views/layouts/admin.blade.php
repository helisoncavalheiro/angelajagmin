<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
  <title>Ângela Carreta</title>
  <!-- CSS  -->
  <link href="css/admin-style.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
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

      <nav class="top-nav light-blue darken-1">
        <a href="#" class="left brand-logo">Blog Ângela Carretta - Área Administrativa</a>
        <ul class="right valign-wrapper">
          <li>
            <a class="dropdown-trigger" href="#!" data-target="dropdown1">
              <i class="material-icons left">account_circle</i>
                Helison
              <i class="material-icons right">arrow_drop_down</i>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <div class="row">
      <div class="col m3 blue-grey darken-4 left-nav">
      </div>


      <!-- INÍCIO DO CONTEÚDO DINÂMICO

      ***NOTE: Todo o conteúdo dinâmico deve ter uma tag div que seja
      pai de todas com a class="col m9 pull-m3"
    -->

     @yield('admin-content')

    <!--
    FIM DO CONTEÚDO DINÂMICO
  -->
    </div>
  </main>

<footer class="light-blue darken-1">
  <div class="row">
    <div class="col s9 push-m3">
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
  </div>
</footer>
</body>

<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<script src="ckeditor/ckeditor.js"></script>
<script src="js/script.js"></script>

</body>

</html>