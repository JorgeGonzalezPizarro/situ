@extends('layouts.app2')
@section('title')
    Login
@stop
@section('content')
    <div class = "container">
        <div class="wrapper">
            @if (Session::has('message'))
                <div class="alert alert-{{(Session::get('status')=='error')?'danger':Session::get('status')}} " alert-dismissable fade in id="sessions-hide">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{Session::get('status')}}!</strong> {!! Session::get('message') !!}
                </div>
            @endif
            {{ Form::open(array('url' => route('login'), 'class' => 'form-horizontal form-signin','files' => true)) }}
            <p style="text-align: center"><img src="/imagenes/logo2.jpg" class="img-circle"/> </p>
            <h3 style="text-align: center;" class="form-signin-heading"> ¡ Bienvenido al Portal de Trayectoria Universitaria ! </h3>
            <hr class="colorgraph"><br>
                @if(!empty($decrypted))

                {!! csrf_field() !!}
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                <div class="col-sm-12">
                    {!! Form::text('email', $email, ['class' => 'form-control','placeholder '=>'E-mail',"value"=>$email , " autocomplete"=>"off"]) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                <div class="col-sm-12">
                    {!! Form::hidden('password', $decrypted, ['class' => 'form-control','placeholder '=>'E-mail',"id"=>"password", "value"=>$decrypted, " autocomplete"=>"off"]) !!}

                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>
                <div class="login-register">
                    <div class="clearfix"></div>
                    <br>
                    <a href="{{url('password/reset')}}">Recuperar contraseña</a>
                    @if ($errors->has('global'))
                        <span class="help-block danger">
                    <strong style="color:red" >{{ $errors->first('global') }}</strong>
                </span>
                    @endif
                </div>
                </form>

            @else
                <div class="row">
                    <div class="alert alert-warning " alert-dismissable fade in id="sessions-hide">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong style="font-weight: 700 !important;    color: #013660;">Has abandonado la plataforma o has alcanzado tu tiempo límite de uso ! </strong>Para volver a entrar en la plataforma utilice la invitación.
                </div>
                </div>
                @endif
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;"><tr><td align="center">


                            <!--[if gte mso 10]>
                            <table width="680" border="0" cellspacing="0" cellpadding="0">
                                <tr><td>
                            <![endif]-->

                            <table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%" style="max-width: 680px; min-width: 300px;">

                                <tr><td align="center" bgcolor="#fbfcfd">
                                    </td></tr>
                                <!--content 1 END-->

                                <!--content 2 -->
                                <tr><td align="center" bgcolor="#ffffff" style="">
                                        <table width="94%" border="0" cellspacing="0" cellpadding="0">
                                            <tr><td align="center">
                                                    <!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;"> </div>

                                                    <div class="mob_100" style="float: left; display: inline-block; width: 33%;">
                                                        <table class="mob_100" width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                            <tr><td align="center" style="line-height: 14px; padding: 0 27px;">
                                                                    <!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;"> </div>
                                                                    <div style="line-height: 14px;">
                                                                        <strong style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #4db3a4;">
                                                                            <a href="" target="" style="color: #4db3a4; text-decoration: none;">SEGUMIENTO </a>
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
                                                                            <a href="" target="" style="color: #4db3a4; text-decoration: none;">FORMACIÓN</a>
                                                                        </strong>
                                                                    </div>
                                                                    <!-- padding --><div style="height: 18px; line-height: 18px; font-size: 10px;"> </div>
                                                                    <div style="line-height: 21px;">
								<span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #98a7b9;">
Comparte tus experiencias , cursos, asignaturas, grados, masters, ...								</span>
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
                                                                            <a href="" target="" style="color: #4db3a4; text-decoration: none;">EXPERIENCIA PROFESIONAL</a>
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



                                        <!-- padding --><div style="height: 30px; line-height: 30px; font-size: 10px;"> </div>
                                    </td></tr>
                                <tr><td class="iage_footer" align="center" bgcolor="#ffffff">



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
                </table> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr><td align="center">
				<span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">
					2018 © <a href="#"> DESSI.</a> Derechos Reservados.
				</span>
                        </td></tr>
                </table>

        </div>
    </div>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

    <script>$(document).ready(function(){
            var value = document.getElementById('password').value;

        // if(value.length >0) {
        //     $("form#form").submit();
        // }
        // else{
        //     $("#password").on('change',function(){
        //         $("form#form").submit();
        //
        //
        //     })
        // }
        });
    </script>
@endsection


