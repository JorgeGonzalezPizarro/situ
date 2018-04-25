@extends('layouts.layoutAdmin')

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.js"></script>--}}
<style>
    input {
        border: 0 !important;
        border-bottom: 1px solid #ddd !important;
        padding: 7px !important;
        width:  80%;
    }
</style>
@section('content')

    <div class="container target">
        <div class="row">


            {{--<div class="col-sm-2" style="float: right;"> <a data-toggle="modal" href="" data-target="#myModal" class="iframe-btn" type="button">--}}
                    {{--<img  id="myimage" title="profile image" src="{!! $otros_datos['img'] !!}" class="img-circle img-responsive" name="imagen">--}}
                    {{--<i id=" " class="fa fa-pencil"></i></a>--}}
            {{--</div>--}}
        </div>




        <div class="row">
            {{ Form::open(array('route' => 'actualizarDatos', 'class' => 'form-style-8','files' => true)) }}

            <div class="col-sm-12">

                <nav class="navbar navbar-light" style="margin-left: 15px; margin-right: 15px;background-color: #e3f2fd;">

                    <div class="collapse navbar-collapse" id="navbarColor03" style="padding-left: 0px !important;">
                        <ul class="nav navbar-nav ">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('misDatos')}}">Personales <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('misDatosAcademicos')}}">Académicos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('misDatosLaborales')}}">Profesionales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('invitar')}}">Invitados</a>
                            </li>

                        </ul>

                    </div>
                </nav>

            <div class="col-sm-3">
                <!--left col-->
                <ul class="list-group">
                    <li class="list-group-item text-muted" style="color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;"contenteditable="false">Log</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Fecha  de registro </strong></span>{{ $user->created_at  }} </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Fecha  último acceso</strong></span><span><p>{{ $user->last_login  }} </p></span>
                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Rol </strong></span> {{ $user->roles()->first()->name }}</li>
                </ul>
                <div class="panel panel-info">
                    <div class="panel-heading">Curso / Carrera

                    </div>
                    <div class="panel-body"><i style="color:green"
                                               class="fa fa-check-square"></i>{{ $user->first_name  }}.

                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">Redes Sociales <i class="fa fa-link fa-1x"></i>

                    </div>
                    <div class="panel-body">
                        <i class="fab fa-facebook-f" style="font-size: 22px;"></i>

                        {!! Form::text('facebook', null, ['id'=>'fieldIDfacebook',
                                              'class' => 'misDatos','readonly' => 'true','value '=> $otros_datos['facebook'] ]) !!}
                        <a href="{!! $otros_datos['facebook'] !!}" class="">
                            <a href="#" id="clickableFb"><i class="far fa-edit"></i>

                            </a>
                        </a>
                    </div>
                    <div class="panel-body">

                        <i class="fab fa-linkedin " style="font-size: 22px"></i>


                        {!! Form::text('linkedin', null, ['id'=>'fieldIDlinkedin',
                                              'class' => 'misDatos','readonly' => 'true','value '=> $otros_datos['linkedin'] ]) !!}
                        <a href="{!! $otros_datos['linkedin'] !!}" class="">
                            <a href="#" id="clickableIn"> <i class="far fa-edit"></i>



                                </a>
                        </a>
                    </div>
                </div>



            </div>

            <div class="col-sm-6" style="" contenteditable="false">

                {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad">--}}


                    <div class="panel panel-info">
                        <div class="panel-heading">Mi Perfil <i class="fa fa-user fa" aria-hidden="true"></i>
                        </div>
                        <div class="panel-body">
                            <div class="row">



                                <div class="  col-md-12">
                                    <table class="table table-user-information">
                                        <div class="input-append">
                                            {{--<input id="fieldID4" type="text" name="imagen" style="display: none;">--}}
                                            {!! Form::text('imagen', $otros_datos['img'], ['id'=>'fieldID4','class' => 'misDatos','readonly' => 'true','style'=>'display:none;' ]) !!}

                                        </div>
                                        <tbody>
                                        <tr>
                                            <td><strong class="">Nombre:</strong></td>
                                            <td>{!! Form::text('first_name', null, ['id'=>'first_name','class' => 'misDatos','readonly' => 'true','value '=> $user->first_name ]) !!}
                                                <a href="#" id="clickable"><i class="far fa-edit"></i>

                                                </a>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="">Apellido:</strong></td>
                                            <td>{!! Form::text('last_name', null, ['id'=>'last_name','class' => 'misDatos','readonly' => 'true','value '=> $user->last_name ]) !!}
                                                <a href="#" id="clickable1"> <i class="far fa-edit"></i>

                                                </a>

                                            </td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <td><strong class="">DNI:</strong></td>
                                            <td>{!! Form::text('dni', null, ['id'=>'dni','class' => 'misDatos','readonly' => 'true','value '=> $user->dni]) !!}
                                                <a href="#" id="clickable5"> <i class="far fa-edit"></i>

                                                </a>

                                            </td>
                                        </tr>
                                            <td><strong class="">Direccion:</strong></td>
                                            <td>{!! Form::text('direccion', null, ['id'=>'direccion','class' => 'misDatos','readonly' => 'true','value '=> $user->direccion]) !!}
                                                <a href="#" id="clickable6"> <i class="far fa-edit"></i>

                                                </a>

                                            </td>
                                        </tr>

                                        <tr>
                                            <td><strong class="">Telefono:</strong></td>
                                            <td>{!! Form::text('telefono', null, ['id'=>'telefono','class' => 'misDatos','readonly' => 'true','value '=> $user->telefono]) !!}
                                                <a href="#" id="clickable7"> <i class="far fa-edit"></i>

                                                </a>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="">Email:</strong></td>
                                            <td>{!! Form::text('email', null, ['id'=>'email','class' => 'misDatos','readonly' => 'true','value '=> $user->email ]) !!}
                                                <a href="#" id="clickable2"> <i class="far fa-edit"></i>

                                                </a>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="">Contraseña:</strong></td>
                                            <td>
                                                <input class="field" readonly name="password" id="password" type="password" >

                                                <a href="#" id="clickable3"> <i class="far fa-edit"></i>

                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            @if (Session::has('error'))
                                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                            @endif
                                            @if (Session::has('msg'))
                                                <div class="alert alert-info">{{ Session::get('msg') }}</div>
                                            @endif
                                            <td><strong class=""> </strong></td>
                                            <td>

                                                <input name="password_confirmation" class="field" data-match="#new_password" data-match-error="Las contraseñas no coinciden" placeholder="Confirmar Contraseña" required readonly  id="password_confirmation" type="password" value="">
                                                <a href="#" id="clickable4"><i class="far fa-edit"></i>

                                                </a>

                                            </td>
                                        </tr>


                                        <input class="field" name="old_password"  id="old_password" type="hidden" value="{{$user->password}}">


                                        </tbody>

                                    </table>
                                    <div class='col-md-5' style="    margin-top: 10px;
                                      margin-left: 200px;">

                                        {!! Form::submit('Actualizar', array('class'=>'btn btn-info disabled' ,'id'=>'boton' , 'style="margin-right:30px"')) !!}</td>

                                    </div>

                                    {!! Form::close() !!}

                                </div>
                            </div>
                        </div>


                    </div>

            </div>
            <div class="col-sm-3">
                <!--left col-->

                <ul class="list-group">
                    <li class="list-group-item text-muted"style="color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;">Imagen  <i class="fa fa-image fa-1x"></i>

                    <li class="list-group-item " style="height: auto;">
                        <a data-toggle="modal" href="" data-target="#myModal" class="iframe-btn" type="button">
                            <img  id="myimage" title="profile image" src="{!! $otros_datos['img'] !!}" style="    width: 200px;
    height: 200px;" class="img-circle img-responsive" name="imagen">
                            <i class="far fa-edit"></i>

                        </a>
                    </li>


                </ul>

                <ul class="list-group">
                    <li class="list-group-item text-muted"style="color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;">Actividad <i class="fas fa-info"></i>

                        </i>

                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Hechos</strong></span> {!! count($hechos) !!}
                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Invitados</strong></span> {!! count($invitados) !!}
                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Profesores Invitados</strong></span> {!! count($profesores) !!}
                    </li>

                </ul>
                <ul class="list-group">
                    <li class="list-group-item text-muted"style="color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;"> Etiquetas <i class="fas fa-tag"></i>



                    </li>
                    @foreach($etiquetas as $etiqueta)
                        <li class="list-group-item text-left"><span class=""><strong
                                        class="">{!!$etiqueta->nombre!!}</strong></span>
                        </li>
                    @endforeach

                    @foreach($etiquetasPublic as $etiquetaPubli)
                        <li class="list-group-item text-left"><span class=""><strong
                                        class="">{!!$etiquetaPubli->slug!!}</strong></span>
                        </li>
                    @endforeach
                    <a  id="mas"  value="" href="{!! route('crearEtiquetaAlumno') !!}" >
                       Añadir Etiqueta <i  style="    font-size: 26px; cursor: pointer" class="fa fa-plus-circle"></i>

                    </a>

                </ul>

            </div>


        </div>
        <footer id="footer">


        </footer>

    </div>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" style="background: transparent;">

            <!-- Modal content-->
            <div class="modal-content" style="background: transparent;">

                <div class="modal-body">
                    <iframe width="550" height="400" src="../js/tinymce/js/tinymce/plugins/responsive_filemanager/filemanager/dialog.php?type=2&field_id=fieldID4'&fldr=" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
                </div>

            </div>

        </div>
    </div>
    </div><!-- /#wrapper -->



{{--<script src="/js/jquery-3.3.1.min.js"></script>--}}

<script>
    $(document).ready(function () {
        //     $(function(){
        //         $('.iframe-btn').fancybox({
        //             'width'	: 1024,
        //             'minHeight'	: 600,
        //             'type'	: 'iframe',
        //             'autoScale'   : true
        //         });
        //     });

        // parent.$.fancybox.close();
        document.getElementById('boton').disabled = true;

        $('#myimage').on('click',function () {

            $('#boton').removeClass('btn btn-info disabled');
            $('#boton').addClass('btn btn-success');
            document.getElementById('boton').disabled = false;



        });
        $('input').on('change',function () {
            $('#boton').removeClass('btn btn-info disabled');
            $('#boton').addClass('btn btn-success');
            document.getElementById('boton').disabled = false;



        })

        var tr = $('#clickable');

        $('#clickable').on('click', function () {


            $('#first_name').attr('readonly', false).focus().css("background-color", "#bfe1e847");
        });
        $('#clickable1').on('click', function () {
            $('#last_name').attr('readonly', false).focus().css("background-color", "#bfe1e847");
            ;


        });
        $('#clickable5').on('click', function () {
            $('#dni').attr('readonly', false).focus().css("background-color", "#bfe1e847");
            ;


        });       $('#clickable6').on('click', function () {
            $('#direccion').attr('readonly', false).focus().css("background-color", "#bfe1e847");
            ;


        });       $('#clickable7').on('click', function () {
            $('#telefono').attr('readonly', false).focus().css("background-color", "#bfe1e847");
            ;


        });
        $('#clickable2').on('click', function () {

            $('#email').attr('readonly', false).focus().css("background-color", "#bfe1e847");
            ;
        });
        $('#clickable3').on('click', function () {

            $('#password').attr('readonly', false).focus().css("background-color", "#bfe1e847").val('');

            $('#password_confirmation').attr('readonly', false).css("background-color", "#bfe1e847");

        });
        $('#clickableFb').on('click', function () {

            $('#fieldIDfacebook').attr('readonly', false).focus().css("background-color", "#bfe1e847")



        });
        $('#clickableIn').on('click', function () {

            $('#fieldIDlinkedin').attr('readonly', false).focus().css("background-color", "#bfe1e847")



        });




    });




</script>
<script>function responsive_filemanager_callback(field_id){
        console.log(field_id);

        var url=jQuery('#'+field_id).val();
        // $('#myModal').modal('hide');


        $('#myimage').attr('src', url);

    }



</script>
@endsection
