<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>



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
									Lorem ipsum dolor sit amet consectetuer sed et diam noumy elit dolore
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
									Lorem ipsum dolor sit amet consectetuer sed et diam noumy elit dolore
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
									Lorem ipsum dolor sit amet consectetuer sed et diam noumy elit dolore
								</span>
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

