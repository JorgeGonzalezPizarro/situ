<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


    <link href="https://fonts.googleapis.com/css?family=Gugi|Lato:100,100i,300,300i,400,400i,700,700i|Roboto:300,300i,400,400i" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
{{--<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">--}}
{{--<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>--}}
<!-- Latest compiled JavaScript -->
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

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>--}}
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>--}}

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

    <link rel="shortcut icon" href="{{{ asset('imagenes/icono situ.ico') }}}">


    <style>

    /***
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
***/
    [type=reset], [type=submit], button, html [type=button] {
        -webkit-appearance: NONE;
    }
    body {
        padding: 0;
        margin: 0;
    }

    html { -webkit-text-size-adjust:none; -ms-text-size-adjust: none;}
    @media only screen and (max-device-width: 680px), only screen and (max-width: 680px) {
        *[class="table_width_100"] {
            width: 96% !important;
        }
        *[class="border-right_mob"] {
            border-right: 1px solid #dddddd;
        }
        *[class="mob_100"] {
            width: 100% !important;
        }
        *[class="mob_center"] {
            text-align: center !important;
        }
        *[class="mob_center_bl"] {
            float: none !important;
            display: block !important;
            margin: 0px auto;
        }
        .iage_footer a {
            text-decoration: none;
            color: #929ca8;
        }
        img.mob_display_none {
            width: 0px !important;
            height: 0px !important;
            display: none !important;
        }
        img.mob_width_50 {
            width: 40% !important;
            height: auto !important;
        }
    }
    .table_width_100 {
        width: 680px;
    }

</style>
</head>


<div id="mailsub" class="notification" align="center">

    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;"><tr><td align="center" bgcolor="#eff3f8">


                <!--[if gte mso 10]>
                <table width="680" border="0" cellspacing="0" cellpadding="0">
                    <tr><td>
                <![endif]-->

                <table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%" style="max-width: 680px; min-width: 300px;">
                    <tr><td>
                            <!-- padding --><div style="height: 80px; line-height: 80px; font-size: 10px;"> </div>
                        </td></tr>
                    <!--header -->


                    <!--content 1 -->
                    <tr><td align="center" bgcolor="#fbfcfd">
                            <table width="90%" border="0" cellspacing="0" cellpadding="0">
                                <tr><td align="center">
                                        <!-- padding --><div style="height: 60px; line-height: 60px; font-size: 10px;"> </div>
                                        <div style="line-height: 44px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 34px; color: #57697e;">
						SITU <br>  Plataforma de Trayectoria Universitaria
					</span>

                                        </div>
                                        <!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;"> </div>
                                    </td></tr>
                                <tr><td align="center">
                                        <div style="line-height: 24px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
                        Has sido invitado para acceder a la nuestra plataforma universitaria
                        @if(isset($alumno))
                            del alumno {{  $alumno}}
                        @elseif(isset($profesor)) de los alumnos registrados.

                       @else
                            para acceder utiliza el siguiente usuario y contraseña.
                        @endif
					</span>
                                        </div>
                                        <!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;"> </div>
                                    </td></tr>
                                @if(isset($password))
                                    <div style="width: 100%;text-align:center";class="table_width_100">
                                <div class="mob_100" style="float: left; display: inline-block; width: 100%;">
                                             <!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;"> </div>
                                    <div class="mob_100" style="float: left; display: inline-block; width: 50%;">

                                    <strong style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #4db3a4;">
                                                        <a href="#1" target="_blank" style="color: #4db3a4; text-decoration: none;">Usuario </a>
                                                    </strong>
                                                <!-- padding --><div style="height: 18px; line-height: 18px; font-size: 10px;"> </div>
								<span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #98a7b9;">
								{{	$email}}
								</span>
                                    </div>

                                    <div class="mob_100" style="float: left; display: inline-block; width: 50%;">

                                    <strong style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #4db3a4;">
                                                        <a href="#1" target="_blank" style="color: #4db3a4; text-decoration: none;">Contraseña </a>
                                                    </strong>
                                                <!-- padding --><div style="height: 18px; line-height: 18px; font-size: 10px;"> </div>
								<span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #98a7b9;">
									{{ $password }}
								</span>
                                    </div>
                                    </div>
                                </div>
                                <tr><td align="center">
                                        <div style="  line-height: 100px;">
                                           <h2> <a style="" type="button" class="btn btn-outline-primary" href="{{ route('login')}}">Acceder </a></h2>
                                            {{--<a type="button" class="btn btn-outline-primary" href="">Acceder </a>--}}

                                        </div>
                                        <!-- padding --><div style="height: 60px; line-height: 60px; font-size: 10px;"> </div>
                                    </td></tr>
                                    @else

                                    <tr><td align="center">
                                            <div style="line-height: 24px;">
                                                <!-- padding --><div style="height: 60px; line-height: 60px; font-size: 10px;"> </div>
                                                <!-- padding --><div style="height: 60px; line-height: 60px; font-size: 10px;"> </div>
                                                <a type="button" class="btn btn-outline-primary" href="{{ url('loginInv').'/'. $email ."/".$encrypted.'/'}}">Acceder </a>

                                            </div>
                                            <!-- padding --><div style="height: 60px; line-height: 60px; font-size: 10px;"> </div>
                                        </td></tr>

                                    @endif
                            </table>
                        </td></tr>
                    <!--content 1 END-->

                    <!--content 2 -->
                    <tr><td align="center" bgcolor="#ffffff" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #eff2f4;">
                            <table width="94%" border="0" cellspacing="0" cellpadding="0">
                                <tr><td align="center">
                                        <!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;"> </div>

                                        <div class="mob_100" style="float: left; display: inline-block; width: 33%;">
                                            <table class="mob_100" width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr><td align="center" style="line-height: 14px; padding: 0 27px;">
                                                        <!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;"> </div>
                                                        <div style="line-height: 14px;">
                                                                <strong style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #4db3a4;">
                                                                    <a href="#1" target="_blank" style="color: #4db3a4; text-decoration: none;">SEGUMIENTO </a>
                                                                </strong>
                                                        </div>
                                                        <!-- padding --><div style="height: 18px; line-height: 18px; font-size: 10px;"> </div>
                                                        <div style="line-height: 21px;">
								<span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #98a7b9;">
Otra manera de ver tu carrera academico-profesional.
                                </span>
                                                        </div>
                                                    </td></tr>
                                            </table>
                                        </div>
                                        <div class="mob_100" style="float: left; display: inline-block; width: 33%;">
                                            <table class="mob_100" width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr><td align="center" style="line-height: 14px; padding: 0 27px;">
                                                        <!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;"> </div>
                                                        <div style="line-height: 14px;">
                                                                <strong style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #4db3a4;">
                                                                    <a href="#2" target="_blank" style="color: #4db3a4; text-decoration: none;">FORMACIÓN</a>
                                                                </strong>
                                                        </div>
                                                        <!-- padding --><div style="height: 18px; line-height: 18px; font-size: 10px;"> </div>
                                                        <div style="line-height: 21px;">
	<span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #98a7b9;">
Comparte tus experiencias , cursos, asignaturas, grados, masters...
                                </span>
                                                        </div>
                                                    </td></tr>
                                            </table>
                                        </div>
                                        <div class="mob_100" style="float: left; display: inline-block; width: 33%;">
                                            <table class="mob_100" width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr><td align="center" style="line-height: 14px; padding: 0 27px;">
                                                        <!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;"> </div>
                                                        <div style="line-height: 14px;">
                                                                <strong style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #4db3a4;">
                                                                    <a href="#3" target="_blank" style="color: #4db3a4; text-decoration: none;">EXPERIENCIA PROFESIONAL</a>
                                                                </strong>
                                                        </div>
                                                        <!-- padding --><div style="height: 18px; line-height: 18px; font-size: 10px;"> </div>
                                                        <div style="line-height: 21px;">
								<span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #98a7b9;">
Date a conocer y haz crecer tu perfil.								</span>
                                                        </div>
                                                    </td></tr>
                                            </table>
                                        </div>
                                    </td></tr>
                                <tr><td><!-- padding -->
                                        <div style="height: 80px; line-height: 80px; font-size: 10px;"> </div></td></tr>
                            </table>
                        </td></tr>

                    <!--footer -->
                    <tr><td class="iage_footer" align="center" bgcolor="#ffffff">

                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr><td align="center">
				<span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">
					2018 © <a href="#"> DESSI.</a> Derechos Reservados.
				</span>
                                    </td></tr>
                            </table>

                            <!-- padding --><div style="height: 30px; line-height: 30px; font-size: 10px;"> </div>
                        </td></tr>
                    <!--footer END-->
                    <tr><td>
                            <!-- padding --><div style="height: 80px; line-height: 80px; font-size: 10px;"> </div>
                        </td></tr>
                </table>
                <!--[if gte mso 10]>
                </td></tr>
                </table>
                <![endif]-->

            </td></tr>
    </table>

</div>

