<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
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
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <script src="/js/jquery-3.3.1.min.js"></script>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- Latest compiled JavaScript -->
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
    {{--<script src="{{ asset('/js/jquery-3.3.1.min.js') }}"></script>--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
    {{--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>--}}
    {{--<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>-->--}}
    {{--<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>--}}

    {{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.material.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css" rel="stylesheet" >
    {{--<link href="https://cdn.datatables.net/1.10.16/css/dataTables.material.min.css" rel="stylesheet" >--}}
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
    {{--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css">--}}

    {{--<link href="//cdn.jsdelivr.net/simplemde/latest/simplemde.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom CSS -->

    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Chosen -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/chosen.css') }}" rel="stylesheet">

    <!-- DataTables CSS -->


    <!-- Custom Fonts -->

    <!-- Chosen -->

    <!-- DataTables CSS -->




    {{--<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->--}}
    {{--<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->--}}
    {{--<!--[if lt IE 9]>--}}


    {{--<![endif]-->--}}



    <style>
        body {
            background: #f1f1f1;
            color: #444;
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
            font-size: 13px;
            line-height: 1.4em;
            min-width: 600px;
        }
        .img-circle {
            border-radius: 50%;
            width: 70px;
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
        .navbar{
            min-height: 60px;
        }
        .navbar-nav.navbar-center {
            position: absolute;
            left: 50%;
            transform: translatex(-50%);
        }
        @media (max-width: 1200px) {
            .navbar-header{
                display: block !important; ;
            }
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
        }
        .list-group-item {
            position: relative;
            display: block;
            padding: 10px 15px;
            margin-bottom: -1px;
            min-height: 55px;
            background-color: #fff;
            border: 1px solid #ddd;
        }
    </style>
    @yield('css')


</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav2">

                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            @if(Sentinel::check())
                <a href="#" class="navbar-brand"      > <span>{{ Sentinel::getUser()->first_name }} </span></a>
                <a href="{{route('logout')}}" class="navbar-brand"     > <span>Salir </span></a>
                <ul class="nav navbar-nav navbar-center">
                    @if (Sentinel::check()   )

                        @if(Sentinel::check() && Sentinel::inRole('Alu'))



                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Nuevo <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach($categorias as $categoria)
                                        <li class="">
                                            <a href="{!! route('hechos', ['categoria'=>$categoria->categoria]) !!}"><i class="fa fa-fw fa-dashboard"></i>{{$categoria->categoria}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="">
                                <a href="{{route('misDatos')}}"><i class="fa fa-user"></i>

                                    Mi perfil </a>

                            </li>
                            <li class="">
                                <a href="{{route('invitar')}}"><i class="fa fa-share-square"></i>



                                    Invitar  </a>

                            </li>
                        @endif



                    @endif

                </ul>
            @endif

        </div>


        <!-- Top Menu Items -->
        <div class="collapse navbar-collapse" style="  padding:15px !important;" id="bs-example-navbar-collapse-1">

            <div id="adminMenu" role="navigation" aria-label="Menú principal">
                <div id="adminmenuwrap" style="">
                    <ul class="nav navbar-nav navbar-left">
                        <a class="navbar-brand" href="#">
                        </a>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('Situ/public')}}">Plataforma de Trayectoria Universitaria</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-center">
                        @if (Sentinel::check()   )

                            @if(Sentinel::check() && Sentinel::inRole('Alu'))



                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Nuevo <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        @foreach($categorias as $categoria)
                                            <li class="">
                                                <a href="{!! route('hechos', ['categoria'=>$categoria->categoria]) !!}"><i class="fa fa-fw fa-dashboard"></i>{{$categoria->categoria}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>

                                <li class="">
                                    <a href="{{route('misDatos')}}"><i class="fa fa-user"></i>

                                        Mi perfil </a>

                                </li>
                                <li class="">
                                    <a href="{{route('invitar')}}"><i class="fa fa-share-square"></i>



                                        Invitar  </a>

                                </li>
                                <li class="">
                                    <a href="{{url('Situ/public')}}"><i class="fa fa-share-square"></i>



                                        Mi SITU  </a>

                                </li>
                            @endif



                        @endif

                    </ul>
                    <ul class="nav navbar-nav navbar-center" style="text-align: center;">
                        <li>



                            @if(Sentinel::check() &&( Sentinel::inRole('Inv')  ) )

                                <div style=" text-align: center;  height: auto; margin:0 auto;">
                                     <h2>Bienvenido al portal  de {{$alumno->first_name}}  {{$alumno->last_name}}</h2>
                                </div>

                               @elseif(Sentinel::check() &&( Sentinel::inRole('Prof')  ) )

                                <div style=" height: auto; margin:0 auto;">
                                     <h2>Bienvenido a Situ </h2>
                                </div>
                            @endif
                        </li></ul>
                            <ul class="nav navbar-nav navbar-right">

                                <li class="dropdown">
                                    @if (Sentinel::check())

                                        <?php $otros_datos=json_decode(Sentinel::getUser()->otros_datos,true);?>
                                        <div class="avatar" style="    width: 250px; float: left; margin-right: 5px;">
                                            <img style=" width: 50px;height: 50px; float: left;"  id="myimagen" title="profile image" src="{!! $otros_datos['img'] !!}" class="img-circle img-responsive" name="imagen">
                                            <a href="#" class="dropdown-toggle" style="    padding: 20px; padding-top: 100px; position: relative;top: 10px;" data-toggle="dropdown"> <span>{{ Sentinel::getUser()->first_name }} </span><b class="caret"></b></a>

                                        </div>
                                    @else
                                        <a href="{{ route('login') }}">Login</a>
                                    @endif
                                    <ul class="dropdown-menu">
                                        {{--@if (Sentinel::check() && (Sentinel::inRole('admin') || Sentinel::inRole('mod')) )--}}
                                        @if (Sentinel::check()   )

                                            @if(Sentinel::check() && Sentinel::inRole('Alu'))


                                                <li class="">
                                                    <a href="{{route('misDatos')}}"><i class="fa fa-user"></i>

                                                        Mi perfil </a>

                                                </li>
                                                <li class="">
                                                    <a href="{{route('invitar')}}"><i class="fa fa-share-square"></i>



                                                        Invitar  </a>

                                                </li>

                                            @endif
                                            <li>
                                                <a href="{{ route('logout') }}">Log Out</a>

                                            </li>

                                        @else
                                            <li>
                                                <a href="{{ route('logout') }}">Some Text</a>
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
            <ul class="nav navbar-nav side-nav"  style="  margin-top: 40px ;">
                @if(Sentinel::check() && Sentinel::inRole('Admin'))
                    <li class="">
                        <a href="{{ url('Admin/adminDashboard') }}"><i class="fa fa-fw fa-dashboard"></i> Panel de control</a>
                    </li>
                    <li class="">
                        <a href="{{ route('nuevoUsuario') }}"><i class="fa fa-fw fa-dashboard"></i> Crear Usuario</a>
                    </li>
                    <li class="">
                        <a href={{ route('crearEtiqueta') }}><i class="fa fa-fw fa-dashboard"></i> CrearEtiqueta</a>
                    </li>
                @elseif(Sentinel::check() && Sentinel::inRole('Alu'))
                    <li class="">
                        <a href="{{ route('alumnoDashboard') }}"><i class="fa fa-fw fa-dashboard"></i> Inicio</a>
                    </li>

                    <li class="">
                        <a href="{!! route('calificaciones')!!}"><i class="fa fa-fw fa-dashboard"></i>Calificaciones</a>
                    </li>
                    <li class="">
                        <a href="{!! url('Situ/public/0/5')!!}"><i class="fa fa-fw fa-dashboard"></i>Portfolio Profesional</a>
                    </li>
                    <li class="">
                        <a href="{!! route('trabajos')!!}"><i class="fa fa-fw fa-dashboard"></i>Trabajos Academicos</a>
                    </li>
                    <li class="">
                        <a href="{!! route('recuerdosAll')!!}"><i class="fa fa-fw fa-dashboard"></i>Recuerdos</a>
                    </li>
                    <li class="">
                        <a href="{!! route('proyectosInvestigacionAll')!!}"><i class="fa fa-fw fa-dashboard"></i>Proyectos</a>
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

    </div><!-- /#page-wrapper -->



    <!-- Bootstrap Core JavaScript -->

    <!-- Select Chosen -->


    <!-- DataTables JavaScript -->
</div>{{--<script src="{{ asset('dataTables/js/jquery.dataTables.min.js') }}"></script>--}}
{{--<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.10/js/jquery.dataTables.min.js"></script>-->--}}
{{--<script src="//cdn.datatables.net/responsive/1.0.2/js/dataTables.responsive.js"></script>--}}
{{--<script src="{{ asset('dataTables/js/dataTables.bootstrap.min.js') }}"></script>--}}
{{--<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.10/js/dataTables.bootstrap.min.js"></script>-->--}}

{{--@yield('scripts')--}}

</body>
<script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
<script>
    $(function() {
        $('.chosen-select').chosen({max_selected_options: 3});
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
    });
</script>
</html>