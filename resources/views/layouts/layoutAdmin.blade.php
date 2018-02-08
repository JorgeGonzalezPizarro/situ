<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Chosen -->
    <link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{{ asset('dataTables/css/dataTables.bootstrap.css') }}"rel="stylesheet">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.10/css/dataTables.bootstrap.min.css">-->
    <link href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css" rel="stylesheet" >.10.16/css/dataTables.material.min.css"></link>
<link href="https://cdn.datatables.net/1.10.16/css/dataTables.material.min.css" rel="stylesheet" >
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>

<link href="//cdn.jsdelivr.net/simplemde/latest/simplemde.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

    <style>
        body {
            height: 100%;
            background-color: #fff;

        }
        pre {
            border: none;
            background: #fff;
            padding: 0;
        }
        /*.hljs {
            padding: 1.5em;
        }*/
        pre code {
            border-radius: 20px;
            overflow: auto;
            word-wrap: normal;
            white-space: pre;
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

    </style>
    @yield('css')


</head>

<body>

<ul id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand pull-left" href="{{ route('home') }}">Back to site</a>
        </div><!-- /.navbar-header -->

        <!-- Top Menu Items -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                @if (Sentinel::check())
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Sentinel::getUser()->email }} <b class="caret"></b></a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                @endif
                <ul class="dropdown-menu">
                    {{--@if (Sentinel::check() && (Sentinel::inRole('admin') || Sentinel::inRole('mod')) )--}}
                    @if (Sentinel::check()   )

                    <li>
                        </li>
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

        </ul>
        </div>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                @if(Sentinel::check() && Sentinel::inRole('Admin'))
                <li class="">
                    <a href="{{ url('Admin/adminDashboard') }}"><i class="fa fa-fw fa-dashboard"></i> Panel de control</a>
                </li>
                <li class="">
                <a href="{{ route('nuevoUsuario') }}"><i class="fa fa-fw fa-dashboard"></i> Crear Usuario</a>
                </li>
                <li class="">
                    {{--<a href={{ route('actualizarUsuario') }}""><i class="fa fa-fw fa-dashboard"></i> Actualizar Usuario</a>--}}
                </li>
                @else
                    <li class="">
                        <a href="{{ url('#') }}"><i class="fa fa-fw fa-dashboard"></i> Alumno Link 2</a>
                    </li>
                    <li class="">
                        <a href="{{ url('#') }}"><i class="fa fa-fw fa-dashboard"></i> Alumno Link 2 </a>
                    </li>
                    <li class="">
                        <a href=""><i class="fa fa-fw fa-dashboard"></i> Alumno Link 3</a>
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

</div><!-- /#wrapper -->
</ul>
<!-- jQuery -->

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('/js/jquery-3.3.1.min.js') }}"></script>

<!-- Select Chosen -->
<script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
<script>
    $(function() {
        $('.chosen-select').chosen({max_selected_options: 3});
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
    });
</script>

<!-- DataTables JavaScript -->
<script src="{{ asset('dataTables/js/jquery.dataTables.min.js') }}"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.10/js/jquery.dataTables.min.js"></script>-->
<script src="//cdn.datatables.net/responsive/1.0.2/js/dataTables.responsive.js"></script>
<script src="{{ asset('dataTables/js/dataTables.bootstrap.min.js') }}"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.10/js/dataTables.bootstrap.min.js"></script>-->

@yield('scripts')

</body>

</html>