<!DOCTYPE html>
<html lang="en">
<head>
    <title>SITU , PLATAFORMA UNIVERSITARIA</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>--}}
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">
    <script src="/js/situJs/jquery.js"></script>

    <script src="/js/situJs/moment.min.js"></script>

    <script src="/js/situJs/_jquery-ui.js"></script>




    <link href="https://fonts.googleapis.com/css?family=Gugi|Lato:100,100i,300,300i,400,400i,700,700i|Roboto:300,300i,400,400i" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
    {{--<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">--}}
    {{--<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>--}}
    <!-- Latest compiled JavaScript -->
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}



    {{--<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>--}}

    {{--<link rel="shortcut icon" href="{{{ asset('imagenes/icono situ.ico') }}}">--}}

    {{--<!-- jQuery library -->--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
    {{--<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">--}}
    {{--<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>--}}
    {{--<!-- Latest compiled JavaScript -->--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
    {{--<script src="{{ asset('/js/jquery-3.3.1.min.js') }}"></script>--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
    {{--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>--}}
    {{--<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>-->--}}
    {{--<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>--}}
    <script src="/js/situJs/jquery.dataTables.min.js"></script>

    {{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
    {{--<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>--}}
    <script src="/js/situJs/dataTables.material.min.js"></script>
    <script src="/js/situJs/bootstrap.min.js"></script>
    <link href="/css/situCss/material.min.css" rel="stylesheet">
    <link href="/css/situCss/jquery.dataTables.css" rel="stylesheet">

    {{--<link href="https://fonts.googleapis.com/css?family=Gugi|Lato:100,100i,300,300i,400,400i,700,700i|Roboto:300,300i,400,400i" rel="stylesheet">--}}
    {{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
    {{--<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>--}}
    {{--<script src="https://cdn.datatables.net/1.10.16/js/dataTables.material.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>--}}
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css" rel="stylesheet" >--}}
    {{--<link href="https://cdn.datatables.net/1.10.16/css/dataTables.material.min.css" rel="stylesheet" >--}}
    {{--<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css">--}}
    <link href="/css/situCss/bootstrap-select.min.css" rel="stylesheet">

    {{--<link href="//cdn.jsdelivr.net/simplemde/latest/simplemde.min.css" rel="stylesheet">--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">--}}

    <!-- Latest compiled and minified JavaScript -->
    <script src="/js/situJs/bootstrap-select.min.js"></script>
    <link href="/css/situCss/bootstrap-datepicker3.css" rel="stylesheet">

<!-- Latest compiled and minified JavaScript -->
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>--}}

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">
     <!-- Custom CSS -->

    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    {{--<!-- Chosen -->--}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/chosen.css') }}" rel="stylesheet">

    {{--<script src="/js/jquery-3.3.1.min.js"></script>--}}
    {{--<script src="/js/3.3.1_jquery.min.js"></script>--}}

    <link href="{{ asset('css/material.min.css') }}" rel="stylesheet">


    <!-- Custom Fonts -->

    {{--<script src="/js/jquery-3.3.1.min.js"></script>--}}

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">





    {{--<!-- Chosen -->--}}

    <!-- DataTables CSS -->





    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Chosen -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/chosen.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{{ asset('imagenes/icono situ.ico') }}}">




    <style>
        body {
            background: white ;
            color: #444;
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
            font-size: 13px;
            line-height: 1.4em;
            min-width: 600px;
        }
        .navbar-inverse .navbar-nav > li > a {
            color: #ffffff;
            font-size: 16px;
        }
        h1,h2,h3,h4,h5{

            /*border-bottom: 1px solid white;*/
            font-family: 'Lato', sans-serif;
            font-style: oblique;
        }
        .navbar-inverse {
            background-color: #003865;
            border-color: #ffffff;
        }
        .img-circle {
            border-radius: 50%;
            width: 70px;
        }
        .dropdown-menu > li > a:hover{
            background: white;
            color: black;
        }
        .dropdown-menu > li > a{

        }
        pre {
            border: none;
            background: #fff;
            padding: 0;
        }
        /*.hljs {
            padding: 1.5em;
        }*/


        .navbar-header{
            display: none ;
        }
        .navbar-brand{display:none ;}
        pre code {
            border-radius: 20px;
            overflow: auto;
            word-wrap: normal;
            white-space: pre;
        }
        .list-group-item:last-child {
            margin-bottom: 0;
            border-bottom-right-radius: 4px;
            height: 50px;
            border-bottom-left-radius: 4px;
        }
        /* Panel */
        .panel-lightblue {
            border-color: #5bc0de;
        }

        .panel-lightblue > .panel-heading {
            border-color: #5bc0de;
            color: #fff;
            background-color: #5bc0de;
        }

        .panel-lightblue > a {
            color: #5bc0de;
        }

        .panel-lightblue > a:hover {
            color: #31b0d5;
        }
        ul.nav li.dropdown:hover ul.dropdown-menu {
            display: block;
        }
        ul.nav li.dropdown:hover ul.dropdown-menu {
            display: block;
        }
        .mdl-data-table tbody tr:hover {
            background-color: #00386538;
        }
        .navbar{
            /*min-height: 60px;*/
        }

        #nav2 li {
            border-bottom: 1px solid white;
        }
        .dropdown-menu > li > a:hover {
            background: #003865 !important;
            color: black;

        }
        #nav2 li a{
            padding-bottom: 20px;
            border-bottom: 1px solid white;
            font-family: 'Lato', sans-serif;
            font-style: oblique;
        }
        .navbar-nav.navbar-center {
            position: absolute;
            left: 50%;
            transform: translatex(-50%);
        }
        .timeline > li > .timeline-panel {
            width: 100%;
            float: left;
            border: 1px solid #00386557;
            border-radius: 6px;
            padding: 20px;
            position: relative;
            -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
            box-shadow: 0 4px 11px rgba(0, 56, 101, 0.44);
            background: #5bc0de0a;
        }
        .timeline > li > .timeline-panel:after {
            display: none !important;
        }
        .timeline > li > .timeline-panel:before {
            display: none !important;
        }
        .navbar-toggle {
            position: relative;
            float: right;
            padding: 9px 10px;
            margin-top: 8px;
            margin-right: 15px;
            color: white;
            margin-bottom: 8px;
            background-color: #003865;
            background-image: none;
            border: 1px solid #5bc0de;
            border-color: #fff;
        }
        @media (max-width: 1200px) {
            .navbar-header{
                display: block !important; ;
            }
            #navbarColor03{
                display: block !important;
                height: auto !important;
                padding-bottom: 0;
                overflow: visible !important;            }
            #wrapper {
                padding-left: 0px !important;
            }
            .navbar-header {
                float: none;
            }

            .navbar-brand {
                display: block;
            }

            .navbar-left, .navbar-right {
                float: none !important;
            }

            .navbar-left {
                display: none !important;
            }

            .navbar-nav > li > .dropdown-menu {
                margin-top: 0;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
                left: 100px;
                top: 10px;
            }

            #myimagen {
                display: none;
            }

            .navbar-nav.navbar-center {
                position: relative;
                /* transform: translatex(-50%); */
            }

            .navbar-toggle {
                display: block;
            }

            .navbar-collapse {
                border-top: 1px solid transparent;
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1);
            }

            .navbar-fixed-top {
                top: 0;
                border-width: 0 0 1px;
            }
            .dropdown-menu > li > a:hover {
                background: #003865 !important;
                color: black;

            }
            .navbar-collapse.collapse {
                display: none !important;
            }

            .navbar-nav {
                float: none !important;
                margin-top: 7.5px;
            }

            .navbar-nav > li {
                float: none;
            }
            hr{
                border: transparent !important;
            }
            .navbar-nav > li > a {
                padding-top: 10px;
                padding-bottom: 10px;
            }

            .collapse.in {
                display: block !important;
            }

            .navbar-nav.navbar-center {
                float: left !important;
                left: 0% !important;
                transform: translatex(0%) !important;
            }

            .navbar-nav.navbar-center li {
                float: left;
                display: inline;
            }

            .nav.navbar-nav.side-nav{
                margin-top: 0px !important;
            }
            .navbar-toggle {
                position: relative;
                float: right;
                padding: 9px 10px;
                margin-top: 8px;
                margin-right: 15px;
                color: white;
                margin-bottom: 8px;
                background-color: #003865;
                background-image: none;
                border-color: #fff;

            }
            .navbar-inverse .navbar-toggle {
                border-color: white;
            }
        }
    </style>
    @yield('css')

    @yield('scripts')


</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">


            @if(Sentinel::check() && Sentinel::inRole('Alu'))
                    <a href="{{ route('alumnoDashboard') }}" class="navbar-brand">
                        <i class="fas fa-home"></i> Inicio
                    </a>


                <a href="{{route('misDatos')}}"  class="navbar-brand"><i class="far fa-smile"></i>



                    Mi perfil </a>
                <a href="{{url('Situ/public')}}" class="navbar-brand" style="display: inline;"><img width="25"  style="display: inline;" src="/imagenes/icono situ.ico"/>



                    Mi SITU  </a>
                <a href="{{route('invitar')}}" class="navbar-brand"><i class="fas fa-user-plus"></i>



                    Invitar  </a>
                <a href="{{route('logout')}}" class="navbar-brand"  style="    float: right;"   > <span>Salir </span></a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav3">
                    Nuevo

                </button>
                    @if (Sentinel::check()   )

                        @if(Sentinel::check() && Sentinel::inRole('Alu'))


                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav2">
                                Hechos
                                </button>
                        <div class="collapse navbar-collapse navbar-ex1-collapse" id="nav3">

                            <ul class="nav navbar-nav side-nav"  style="  margin-top: 20px ;">

                                @foreach($categorias as $categoria)
                                    <li class="" style="    padding: 10px;
    color: white;">
                                        <a href="{{route('hechos', ['categoria'=>$categoria->categoria]) }}" style="    color: white;">
                                            <i class="fas fa-plus-square"></i>
                                            {{$categoria->categoria}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>


                        @endif



                    @endif

            @elseif(Sentinel::check() && Sentinel::inRole('Admin'))
                    <a href=" {{ url('Admin/adminDashboard') }}"  class="navbar-brand"><i class="fas fa-home"></i>





                        Panel de control</a>
                <a href=" {{ url('Admin/nuevoUsuario') }}"  class="navbar-brand" style="display: inline;"><img width="25"  style="display: inline;" src="/imagenes/icono situ.ico"/>



                        Nuevo Usuario  </a>
                    <a href="{{ url('Admin/crearEtiqueta') }}" class="navbar-brand"><i class="fas fa-user-plus"></i>



                       Crear Etiqueta  </a>
                    <a href="{{route('logout')}}" class="navbar-brand"  style="    float: right;"   > <span>Salir </span></a>




                @endif

        </div>


        <!-- Top Menu Items -->
        <div class="collapse navbar-collapse" style=" " id="bs-example-navbar-collapse-1">

            <div id="adminMenu" role="navigation" aria-label="Menú principal">
                <div id="adminmenuwrap" style="">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="nav-item"  style="    right: 20px;">
                            <a style="  font-family: 'Playfair Display', serif;
    font-style: italic;" class="nav-link" href="{{url('Situ/public')}}">
                                <img style="     margin-top: -10px; width: 200px; float: left;"  id="myimagen" title="Icono SITU" src="/imagenes/logo1.jpg" class="img-responsive" name="imagen">
                            </a>

                        </li>
                    </ul>
                        <ul style="    font-family: 'Gugi', cursive;" class="nav navbar-nav navbar-center">
                            @if (Sentinel::check()   )

                                @if(Sentinel::check() && Sentinel::inRole('Alu'))



                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-plus"></i>
                                            Nuevo <span class="caret"></span></a>
                                        <ul  style="    background: #003865c7;
    color: white;" class="dropdown-menu" id="menuNuevo">
                                            @foreach($categorias as $categoria)
                                                <li class="" style="    padding: 10px;
    color: white;">
                                                    <a href="{{ route('hechos', ['categoria'=>$categoria->categoria])}}" style="    color: white;">
                                                        <i class="fas fa-plus-square"></i>
                                                        {{$categoria->categoria}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <li class="">
                                        <a href="{{route('misDatos')}}"><i class="far fa-smile"></i>



                                            Mi perfil </a>

                                    </li>
                                    <li class="">
                                        <a href="{{route('invitar')}}"><i class="fas fa-user-plus"></i>



                                            Invitar  </a>

                                    </li>
                                    <li class="">
                                        <a href="{{url('Situ/public')}}"><img width="25"  src="/imagenes/icono situ.ico"/>



                                            Mi SITU  </a>

                                    </li>
                                    <li class="">

                                        <a style="padding: 10px;" target="_blank" href="{{url('Situ/public/0/5/'.Sentinel::getUser()->id.'/cv')}}"><button type="button" class="btn btn-raised btn-secondary">CV</button></a>
                                    </li>
                                    <li class="">

                                        <a style="padding: 10px;" target="_blank" href="{{route('logAccesos')}}"><button type="button" class="btn btn-raised btn-secondary">LOGS ACCESOS</button></a>
                                    </li>
                                @endif



                            @endif

                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>



                    @if(Sentinel::check() &&( Sentinel::inRole('Inv') ||  Sentinel::inRole('Prof') ) )

                        <div style="width:600px; height: auto; margin:0 auto;">
                            <ul class="nav navbar-nav ">
                                <li ><h2>Bienvenido al portal  de {{$alumno->getUsuario()->get()->first()->first_name}}  {{$alumno->getUsuario()->get()->first()->last_name}}</h2></li>
                            </ul>
                        </div>
                    @endif

                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                            @if (Sentinel::check())

                                <?php $otros_datos=json_decode(Sentinel::getUser()->otros_datos,true);?>
                                <div class="avatar" style="    width: 250px; float: left; margin-right: 5px;">
                                    <img style=" width: 50px;height: 50px; float: left;"  id="myimagen" title="Imagen Usuario" src="{!! $otros_datos['img'] !!}" class="img-circle img-responsive" name="imagen">
                                    <a href="#" class="dropdown-toggle" style="color:white;    padding: 20px; padding-top: 100px; position: relative;top: 10px;" data-toggle="dropdown"> <span>{{ Sentinel::getUser()->first_name }} </span><b class="caret"></b></a>

                                </div>
                            @else
                                <a href="{{ route('login') }}">Login</a>
                            @endif
                            <ul class="dropdown-menu" style=" margin-right: 20px;
                             background: #003865c7;">
                                {{--@if (Sentinel::check() && (Sentinel::inRole('admin') || Sentinel::inRole('mod')) )--}}
                                @if (Sentinel::check()   )

                                    @if(Sentinel::check() && Sentinel::inRole('Alu'))



                                    @endif
                                    <li>
                                        <a  style="  background: #003865c7 !important; ;color: white;" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                            Salir</a>

                                    </li>

                                @else
                                    <li>
                                        <a href="{{ route('logout') }}"></a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                     </li>
                    </ul>
                    </ul>

                </div>
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav2">
                    <span class="sr-only">Toggle navigation</span>


                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
        </div>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse" id="nav2">
            <ul class="nav navbar-nav side-nav"  style="  margin-top: 20px ;">
                @if(Sentinel::check() && Sentinel::inRole('Admin'))
                    <li class="">
                        <a href="{{ url('Admin/adminDashboard') }}"><i class="fas fa-home"></i>

                            Panel de control</a>
                    </li>
                    <li class="">
                        <a href="{{ route('nuevoUsuario') }}"><i class="fas fa-user-plus"></i>

                            Crear Usuario</a>
                    </li>
                    <li class="">
                        <a href={{ route('crearEtiqueta') }}><i class="fas fa-tags"></i>

                            CrearEtiqueta</a>
                    </li>
                @elseif(Sentinel::check() && Sentinel::inRole('Alu'))
                    <li class="">
                        <a href="{{ route('alumnoDashboard') }}"><i class="fas fa-home"></i> Inicio</a>
                    </li>

                    {{--@foreach($categorias as $categoria)--}}
                        <li class="">
                            <a href="{{ route('calificaciones')}}"><i class="fas fa-tasks"></i>Calificaciones</a>
                        </li>
                    <li class="">
                        <a href="{{ url('Situ/public/0/5')}}"><i class="fas fa-briefcase"></i>

                            Portfolio Profesional</a>
                    </li>
                    <li class="">
                        <a href="{{ route('trabajos')}}"><i class="fas fa-graduation-cap"></i>

                            Trabajos Academicos</a>
                    </li>
                    <li class="">
                        <a href="{{route('recuerdosAll')}}"><i class="fas fa-bookmark"></i>

                            Recuerdos</a>
                    </li>
                    <li class="">
                        <a href="{{ route('proyectosInvestigacionAll')}}"><i class="fas fa-newspaper"></i>

                            Proyectos</a>
                    </li>
                    <li class="">
                        <a href="{{ route('hechos', ['categoria'=>"Frases Guia"])}}"><i class="fas fa-quote-left"></i>




                            Mis Frases</a>
                    </li>
                    <li class="">
                        <a href="{{ route('hechos', ['categoria'=>"Reflexiones"])}}"><i class="far fa-comments"></i>

                            Reflexiones</a>
                    </li>
                @endif
            </ul>
        </div>

        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            @if (Session::has('permission'))
                <div class="alert alert-danger">
                    {{ Session::get('permission')  }}
                </div>
            @endif
        <!-- /.content -->
            @yield('content')


        </div><!-- /.container-fluid -->
        @if(Sentinel::inRole('Alu'))

            {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">--}}
                {{--Launch demo modal--}}
            {{--</button>--}}
            {{--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
                {{--<div class="modal-dialog" role="document">--}}
                    {{--<div class="modal-content">--}}

                        {{--<div class="modal-body">--}}

                            {{--<div id="myCarousel" class="carousel slide" data-ride="carousel">--}}
                {{--<!-- Carousel indicators -->--}}
                {{--<ol class="carousel-indicators">--}}
                    {{--<li data-target="#myCarousel" data-slide-to="0" class="active"></li>--}}
                    {{--<li data-target="#myCarousel" data-slide-to="1"></li>--}}
                    {{--<li data-target="#myCarousel" data-slide-to="2"></li>--}}
                {{--</ol>--}}
                {{--<!-- Wrapper for carousel items -->--}}
                {{--<div class="carousel-inner">--}}
                    {{--<div class="item active">--}}
                        {{--<img src="https://www.w3schools.com/bootstrap4/ny.jpg" alt="First Slide">--}}
                    {{--</div>--}}
                    {{--<div class="item">--}}
                        {{--<img src="https://www.w3schools.com/bootstrap4/la.jpg" alt="Second Slide">--}}
                    {{--</div>--}}
                    {{--<div class="item">--}}
                        {{--<img src="https://www.w3schools.com/bootstrap4/ny.jpg" alt="Third Slide">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- Carousel controls -->--}}
                {{--<a class="carousel-control left" href="#myCarousel" data-slide="prev">--}}
                    {{--<span class="glyphicon glyphicon-chevron-left"></span>--}}
                {{--</a>--}}
                {{--<a class="carousel-control right" href="#myCarousel" data-slide="next">--}}
                    {{--<span class="glyphicon glyphicon-chevron-right"></span>--}}
                {{--</a>--}}
            {{--</div>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">--}}
            {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
            {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>--}}
            {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>--}}
            {{--<script src="/js/situJs/jquery-min-.js"></script>--}}
            {{--<script src="/js/situJs/bootstrap-bundle.min.js"></script>--}}




            {{--<link href="/css/situCss/bootstrap-min.css" rel="stylesheet">--}}


            {{--<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->--}}
            {{--<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->--}}
            {{--<!--[if lt IE 9]>--}}

            <style>
                .modal fade in{
                    height: 500px !important;
                    top: 100px !important;
                    width: 80% !important;
                    margin: 0 auto;
                }
                carousel-inner img{
                   height: 500px;
                    background: no-repeat center center scroll;
                    -webkit-background-size: cover;
                    -moz-background-size: cover;
                    -o-background-size: cover;
                    background-size: cover;
                }
            </style>
        @endif
    </div><!-- /#page-wrapper -->

</div>

    <!-- Bootstrap Core JavaScript -->

    <!-- Select Chosen -->


    <!-- DataTables JavaScript -->
{{--<script src="{{ asset('dataTables/js/jquery.dataTables.min.js') }}"></script>--}}
{{--<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.10/js/jquery.dataTables.min.js"></script>-->--}}
{{--<script src="//cdn.datatables.net/responsive/1.0.2/js/dataTables.responsive.js"></script>--}}
{{--<script src="{{ asset('dataTables/js/dataTables.bootstrap.min.js') }}"></script>--}}
{{--<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.10/js/dataTables.bootstrap.min.js"></script>-->--}}

{{--@yield('scripts')--}}

</body>
<script src="/js/situJs/chosen.jquery.js"></script>

<script>
    $(function() {
        $('.chosen-select').chosen({max_selected_options: 3});
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
    });

</script>

</html>