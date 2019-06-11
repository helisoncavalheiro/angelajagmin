<html>

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ secure_asset('assets/materialize/materialize.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ secure_asset('assets/admin/css/login.css')}}"
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
    <center>
      <div class="section"></div>


      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
          <h5 class="indigo-text">Faça login para acessar a área administrativa.</h5>
          <form class="col s12" method="post" action="{{ action('Auth\LoginController@login') }}">
            {{ csrf_field() }}
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='email' name='email' id='email' />
                <label for='email'>E-mail</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='password' id='password' />
                <label for='password'>Senha</label>
              </div>
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Login</button>
              </div>
              <div class="row">
                <a href="{{ action('Admin\AuthorController@create') }}">
                  Criar conta
                </a>
              </div>
            </center>
          </form>
        </div>
      </div>
    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</body>

</html>
