{{--@extends('layouts.email')--}}

{{--@section('content')--}}

    {{--<div class="col-lg-10 col-lg-offset-1">--}}

        {{--<h1><i class="fa fa-users"></i> Claves de Acceso</h1>--}}

        {{--<div class="table-responsive">--}}
            {{--<table class="table table-bordered table-striped">--}}

                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th>Name</th>--}}
                    {{--<th>Email</th>--}}
                    {{--<th>Password </th>--}}
                    {{--<th></th>--}}
                {{--</tr>--}}
                {{--</thead>--}}

                {{--<tbody>--}}
                {{--<tr>--}}


                    {{--<td>{{ $request['first_name']}}</td>--}}
                    {{--<td>{{ $request['email']}}</td>--}}
                    {{--<td>{{ $request['password']}}</td>--}}
<<<<<<< HEAD
=======
                    {{--<td>{!!  $request['first_name']!!}</td>--}}
                    <td>{!! $email!!}</td>
                    <td>{!! $encrypted!!}</td>

                    {{--{{ Form::open(array('url' => 'loginInv', 'class' => 'form-style-8','files' => true)) }}--}}
                    {{--<input type="hidden" value="{{$request['email']}}" name="email">--}}
                    {{--<input type="hidden" value="{{$request['password']}}" name="password">--}}
                    <a  href="{{ url('loginInv').'/'. $email ."/".$encrypted.'/'}}">Acceder </a>
{{--                {{ Form::close() }}--}}
>>>>>>> 07f47ebd205005844f62994b2b90f2cb57485f39

                {{--</tbody>--}}

            {{--</table>--}}
        {{--</div>--}}


    {{--</div>--}}

{{--@endsection--}}

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!--
Responsive Email Template by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->

<style>

    /***
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
***/

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
                    <tr><td align="center" bgcolor="#ffffff">
                            <!-- padding --><div style="height: 30px; line-height: 30px; font-size: 10px;"> </div>
                            <table width="90%" border="0" cellspacing="0" cellpadding="0">
                                <tr><td align="left"><!--

				Item --><div class="mob_center_bl" style="float: left; display: inline-block; width: 115px;">
                                            <table class="mob_center" width="115" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr><td align="left" valign="middle">
                                                        <!-- padding --><div style="height: 20px; line-height: 20px; font-size: 10px;"> </div>
                                                        <table width="115" border="0" cellspacing="0" cellpadding="0" >
                                                            <tr><td align="left" valign="top" class="mob_center">
                                                                    <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
                                                                    </a>      <img src="http://artloglab.com/metromail/images/logo.gif" width="115" height="19" alt="Metronic" border="0" style="display: block;" /></font></a>
                                                                </td></tr>
                                                        </table>
                                                    </td></tr>
                                            </table></div><!-- Item END--><!--[if gte mso 10]>
                                        </td>
                                        <td align="right">
                                        <![endif]--><!--

				Item --><div class="mob_center_bl" style="float: right; display: inline-block; width: 88px;">
                                            <table width="88" border="0" cellspacing="0" cellpadding="0" align="right" style="border-collapse: collapse;">
                                                <tr><td align="right" valign="middle">
                                                        <!-- padding --><div style="height: 20px; line-height: 20px; font-size: 10px;"> </div>
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                                            <tr><td align="right">
                                                                    <!--social -->
                                                                    <div class="mob_center_bl" style="width: 88px;">
                                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                                            <tr><td width="30" align="center" style="line-height: 19px;">
                                                                                    <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                                                    </a></td><td width="39" align="center" style="line-height: 19px;">
                                                                                    <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                                                            <img src="http://artloglab.com/metromail/images/twitter.gif" width="19" height="16" alt="Twitter" border="0" style="display: block;" /></a>
                                                                                </td><td width="29" align="right" style="line-height: 19px;">
                                                                                    <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                                                            <img src="http://artloglab.com/metromail/images/dribbble.gif" width="19" height="19" alt="Dribbble" border="0" style="display: block;" /></a>
                                                                                </td></tr>
                                                                        </table>
                                                                    </div>
                                                                    <!--social END-->
                                                                </td></tr>
                                                        </table>
                                                    </td></tr>
                                            </table></div><!-- Item END--></td>
                                </tr>
                            </table>
                            <!-- padding --><div style="height: 50px; line-height: 50px; font-size: 10px;"> </div>
                        </td></tr>
                    <!--header END-->

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
                        Has sido invitado para acceder a la trayectoria universitaria del alumno
					</span>
                                        </div>
                                        <!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;"> </div>
                                    </td></tr>
                                <tr><td align="center">
                                        <div style="line-height: 24px;">
                                            <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
                                                <font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
                                                    <img src="http://artloglab.com/metromail/images/trial.gif" width="193" height="43" alt="30-DAYS FREE TRIAL" border="0" style="display: block;" /></font></a>
                                        </div>
                                        <!-- padding --><div style="height: 60px; line-height: 60px; font-size: 10px;"> </div>
                                    </td></tr>
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
                    <!--content 2 END-->

                    <!--links -->

                    <!--links END-->

                    <!--content 3 -->
                    <tr><td align="center" bgcolor="#ffffff" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #eff2f4;">
                            <table width="94%" border="0" cellspacing="0" cellpadding="0">
                                <tr><td align="center">
                                        <!-- padding --><div style="height: 80px; line-height: 80px; font-size: 10px;"> </div>

                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr><td align="center">
						<span style="font-family: Arial, Helvetica, sans-serif; font-size: 26px; color: #57697e;">
							Informacion sobre SITU
						</span>
                                                </td></tr>
                                        </table>

                                        <div class="mob_100" style="float: left; display: inline-block; width: 33%;">
                                            <table class="mob_100" width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr><td align="center" style="line-height: 14px; padding: 0 10px;">
                                                        <!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;"> </div>
                                                        <div style="line-height: 14px;">
                                                            <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                            </a>                                                        </div>
                                                    </td></tr>
                                            </table>
                                        </div>
                                        <div class="mob_100" style="float: left; display: inline-block; width: 33%;">
                                            <table class="mob_100" width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr><td align="center" style="line-height: 14px; padding: 0 10px;">
                                                        <!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;"> </div>
                                                        <div style="line-height: 14px;">
                                                            <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                            </a> </div>
                                                    </td></tr>
                                            </table>
                                        </div>
                                        <div class="mob_100" style="float: left; display: inline-block; width: 33%;">
                                            <table class="mob_100" width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr><td align="center" style="line-height: 14px; padding: 0 10px;">
                                                        <!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;"> </div>
                                                        <div style="line-height: 14px;">
                                                            <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">

                                                            </a> </div>
                                                    </td></tr>
                                            </table>
                                        </div>
                                    </td></tr>
                                <tr><td><!-- padding --><div style="height: 80px; line-height: 80px; font-size: 10px;"> </div></td></tr>
                            </table>
                        </td></tr>
                    <!--content 3 END-->

                    <!--brands -->
                    <tr><td align="center" bgcolor="#ffffff" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #eff2f4;">
                            <table width="94%" border="0" cellspacing="0" cellpadding="0">
                                <tr><td align="center">

                                        <div class="mob_100" style="float: left; display: inline-block; width: 25%;">
                                            <table class="mob_100" width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr><td align="center" style="line-height: 14px; padding: 0 24px;">
                                                        <!-- padding --><div style="height: 30px; line-height: 30px; font-size: 10px;"> </div>
                                                        <div style="line-height: 14px;">
                                                            <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                            </a></div>
                                                    </td></tr>
                                            </table>
                                        </div>

                                        <div class="mob_100" style="float: left; display: inline-block; width: 25%;">
                                            <table class="mob_100" width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr><td align="center" style="line-height: 14px; padding: 0 24px;">
                                                        <!-- padding --><div style="height: 30px; line-height: 30px; font-size: 10px;"> </div>
                                                        <div style="line-height: 14px;">
                                                            <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                            </a></div>/td></tr>
                                            </table>
                                        </div>

                                        <div class="mob_100" style="float: left; display: inline-block; width: 25%;">
                                            <table class="mob_100" width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr><td align="center" style="line-height: 14px; padding: 0 24px;">
                                                        <!-- padding --><div style="height: 30px; line-height: 30px; font-size: 10px;"> </div>
                                                        <div style="line-height: 14px;">
                                                            <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                            </a></div>
                                                    </td></tr>
                                            </table>
                                        </div>

                                        <div class="mob_100" style="float: left; display: inline-block; width: 25%;">
                                            <table class="mob_100" width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr><td align="center" style="line-height: 14px; padding: 0 24px;">
                                                        <!-- padding --><div style="height: 30px; line-height: 30px; font-size: 10px;"> </div>
                                                        <div style="line-height: 14px;">
                                                            <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                            </a> </div>
                                                    </td></tr>
                                            </table>
                                        </div>

                                    </td></tr>
                                <tr><td><!-- padding --><div style="height: 28px; line-height: 28px; font-size: 10px;"> </div></td></tr>
                            </table>
                        </td></tr>
                    <!--brands END-->

                    <!--footer -->
                    <tr><td class="iage_footer" align="center" bgcolor="#ffffff">
                            <!-- padding --><div style="height: 80px; line-height: 80px; font-size: 10px;"> </div>

                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr><td align="center">
				<span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">
					2018 © DESSI. Derechos Reservados.
				</span><
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

<br>
<br>
    <strong>Desarrollado por <a href="#" target="_blank">DESSI</a></strong>
<br>
<br>