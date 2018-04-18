@extends('layouts.app')
@section('title')
    Login
@stop
@section('content')
    <div class = "container">
            @if (Session::has('message'))
                <div class="alert alert-{{(Session::get('status')=='error')?'danger':Session::get('status')}} " alert-dismissable fade in id="sessions-hide">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{Session::get('status')}}!</strong> {!! Session::get('message') !!}
                </div>
            @endif
                <div class="container">
            {{ Form::open(array('url' => route('login'), 'class' => 'form-horizontal form-signin','files' => true)) }}
                    <div class="form-group">

                    <p style="text-align: center"><img src="/imagenes/logo2.jpg" class="img-circle"/> </p>
                <h3 style="text-align: center;" class="form-signin-heading"> ¡ Bienvenido al Portal de Trayectoria Universitaria ! </h3>
            <hr class="colorgraph"><br>
            {!! csrf_field() !!}
                    </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                <div class="col-sm-12">
                    {!! Form::text('email', null, ['class' => 'form-control','placeholder '=>'E-mail']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                <div class="col-sm-12">
                    {!! Form::password('password', ['class' => 'form-control','placeholder '=>'Password']) !!}
                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>


            </form>
            </div>
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
@endsection

@section('scripts')


@endsection