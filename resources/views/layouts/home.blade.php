<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Ângela Carreta</title>
    <!-- CSS  -->
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body class="blue-grey lighten-5">
    <header>
        <nav class="col m8 top-nav navbar-fixed deep-orange lighten-1" role="navigation">
            <div class="container">
                <div class="nav-wrapper">
                    <div class="row">
                        <div class="col s12 offset-m1">
                            <div class="">
                                <ul class="center hide-on-med-and-down">
                                    <li><a class="nav-item" href="#">Início</a></li>
                                    <li><a class="nav-item" href="#">Projetos</a></li>
                                    <li><a class="nav-item" href="#">Atividades</a></li>
                                    <li>
                                        <a class="dropdown-trigger nav-item" data-target="dropdown1" href="#!">
                                            Anos Iniciais
                                            <i class="material-icons right">arrow_drop_down</i>
                                        </a>
                                    </li>
                                    <li><a class="nav-item">Quem sou Eu</a></li>
                                    <li><a class="nav-item">Contato</a></li>
                                </ul>
                                <ul id="nav-mobile" class="sidenav">
                                    <li><a href="#">Navbar Link</a></li>
                                </ul>
                                <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i
                                        class="material-icons">menu</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div>
            <img class="responsive-img header-img" src="images/header.jpg">
        </div>
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
                    <p class="grey-text text-lighten-4">We are a team of college students working on this project like
                        it's our full time job. Any amount would help support and continue development on this project
                        and is greatly appreciated.</p>
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
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
