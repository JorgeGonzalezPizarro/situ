<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SITU , PLATAFORMA UNIVERSITARIA</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="//cdn.jsdelivr.net/simplemde/latest/simplemde.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script src="{{ asset('bootstrap-js/bootstrap.bundle.js') }}" ></script>
    <script src="{{ asset('bootstrap-js/bootstrap.js') }}" ></script>

    <style>
        body {
            height: 100%;
            background-color: #fff;
            margin-top:0px;

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
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header" style="width: 100%;">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        SITU
                    </a>
                    <a  style=" margin:5px;float: right;"><img src="/imagenes/logo1.jpg" width="200px" height="50px">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->


                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest

                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
