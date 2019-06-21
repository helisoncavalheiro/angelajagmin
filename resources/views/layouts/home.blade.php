<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Ângela Carreta</title>
    <!-- CSS  -->
    <link href="{{ secure_asset('assets/home/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ secure_asset('assets/materialize/materialize.css') }}" type="text/css" rel="stylesheet"
          media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

</head>

<body class="blue-grey lighten-5">
<header>
    <nav class="top-nav navbar-fixed deep-orange lighten-1" role="navigation">

            <div class="nav-wrapper">
                <a href="{{ action('Home\PostController@index')}}" class="brand-logo valign-wrapper" ><img class="nav-logo" src="{{ secure_asset('assets/images/brand-logo.png')  }}"> </a>
                <ul class="right hide-on-med-and-down">
                    <li><a class="nav-item" href=" {{ action('Home\PostController@index')}} ">Início</a></li>
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
<!--
<footer class="page-footer deep-orange lighten-1">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
    </div>
</footer>
-->
<!--  Scripts-->
<script src="{{ secure_asset('assets/materialize/materialize.js') }}"></script>
<script src="{{ secure_asset('assets/home/js/script.js') }}"></script>

</body>

</html>
