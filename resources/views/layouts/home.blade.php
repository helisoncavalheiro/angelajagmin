<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Ângela Carreta</title>
    <!-- CSS  -->
    <link href="{{ asset('assets/home/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('assets/materialize/materialize.css') }}" type="text/css" rel="stylesheet"
          media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

</head>

<body class="blue-grey lighten-5">
<header>
    <nav class="top-nav navbar-fixed deep-orange lighten-1" role="navigation">

            <div class="nav-wrapper">
                <a href="#" class="brand-logo logo"><p>Ângela Jagmin Carretta</p></a>
                <ul class="right hide-on-med-and-down">
                    <li><a class="nav-item" href=" {{action('Home\PostController@index')}} ">Início</a></li>
                    <li><a class="nav-item" href="#">Projetos</a></li>
                    <li><a class="nav-item" href="#">Categorias</a></li>
                    <li><a class="nav-item">Sobre mim</a></li>
                    <li><a class="nav-item">Contato</a></li>
                </ul>
                <ul id="nav-mobile" class="sidenav">
                    <li><a href="#">Navbar Link</a></li>
                </ul>
                <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i
                            class="material-icons">menu</i></a>
            </div>
    </nav>

    <ul id="dropdown1" class="dropdown-content purple-text darken2">
        <li><a class="purple-text darken2" href="#!">1º Ano</a></li>
        <li><a class="purple-text darken2" href="#!">2º Ano</a></li>
        <li><a class="purple-text darken2" href="#!">3º Ano</a></li>
        <li><a class="purple-text darken2" href="#!">4º Ano</a></li>
        <li><a class="purple-text darken2" href="#!">5º Ano</a></li>
        <li class="divider"></li>
    </ul>

</header>

@yield('content')

<footer class="orange darken-4">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Company Bio</h5>
                <span class="grey-text text-lighten-4">

                    </span>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Settings</h5>
                <ul>
                    <li><a class="white-text" href="#!">Link 1</a></li>
                    <li><a class="white-text" href="#!">Link 2</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Connect</h5>
                <ul>
                    <li><a class="white-text" href="#!">Link 1</a></li>
                    <li><a class="white-text" href="#!">Link 2</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Helison Cavalheiro</a>
        </div>
    </div>
</footer>

<!--  Scripts-->
<script src="{{ asset('assets/materialize/materialize.js') }}"></script>
<script src="{{ asset('assets/home/js/script.js') }}"></script>

</body>

</html>
