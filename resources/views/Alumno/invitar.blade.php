@extends('layouts.layoutAdmin')
<script src="/js/jquery-3.3.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.js"></script>
<style>
    input {
        border: 0 !important;
        border-bottom: 1px solid #ddd !important;
        padding: 7px !important;
        width:  80%;
    }
</style>@section('content')

    <div class="container target">
        <div class="row">
            {{ Form::open(array('route' => 'invitar', 'class' => 'form-style-8','files' => true)) }}


            <div class="col-sm-2" style="float: right;">
                    <img  id="myimage" title="profile image" src="{!! $otros_datos['img'] !!}" class="img-circle img-responsive" name="imagen">
            </div>
        </div>




        <div class="row">
            <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                <div class="collapse navbar-collapse" id="navbarColor03">
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




            <div class="col-sm-12" style="" contenteditable="false">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad">


                    <div class="panel panel-info">


                        <div class="panel-body">
                            <div class="row">



                                <div class=" col-md-12 col-lg-12 ">

                                    <table class="table table-user-information" id="mitabla">
                                        <div class="input-append">
                                            {{--<input id="fieldID4" type="text" name="imagen" style="display: none;">--}}
                                            {!! Form::text('imagen', $otros_datos['img'], ['id'=>'fieldID4','class' => 'misDatos','readonly' => 'true','style'=>'display:none;' ]) !!}

                                        </div>
                                        <tbody>
                                        <tr>
                                            <td><strong class="">Nombre Invitado:</strong></td>
                                            <td>{!! Form::text('first_name', null, ['id'=>'first_name','class' => 'misDatos']) !!}

                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="">Apellido Invitado:</strong></td>
                                            <td>{!! Form::text('last_name', null, ['id'=>'last_name','class' => 'misDatos']) !!}

                                            </td>
                                        </tr>
                                        <tr>
                                            <div class="form-group  {{ $errors->has('email') ? 'has-error' : ''}}">

                                            <td><strong class="">Correo Invitado:</strong></td>
                                            <td>{!! Form::text('email', null, ['id'=>'email','class' => 'misDatos']) !!}

                                            </td>
                                                {!! $errors->first('email', '<div class="alert alert-danger"><p>
El correo electronico ya existe</p></div>') !!}

                                            </div>
                                        </tr>
                                        <tr>
                                            <td><strong class="">Password:</strong></td>
                                            <td>
                                                <input class="field"  name="password" id="password" type="password" >

                                            </td>
                                        </tr>
                                        <tr>
                                        <td><strong class=""> </strong></td>
                                        <td>

                                            <input name="password_confirmation" class="field" data-match="#new_password" data-match-error="Las contraseñas no coinciden" placeholder="Confirmar Contraseña" required   id="password_confirmation" type="password" value="">

                                        </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="">Rol:</strong></td>
                                            <td>
                                            {{--{!! Form::select($role->Slug, null, ['class' => 'form-control','placeholder '=>'Enter your  name']) !!}--}}
                                                {!! Form::select('roles[]', ['3'=>'Profesor','4'=>'Invitado'] ,$roles, ['class' => 'form-control chosen-select']) !!}


                                            </td>
                                        </tr>
                                        <tr>
                                            @if (Session::has('error'))
                                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                            @endif
                                            @if (Session::has('msg'))
                                                <div class="alert alert-info">{{ Session::get('msg') }}</div>
                                            @endif

                                        </tr>



                                        </tbody>

                                    </table>
                                    <div class='col-md-5' style="    margin-top: 10px;
                                      margin-left: 240px;">

                                        {!! Form::submit('Create Post', array('class'=>'btn btn-info ' ,'id'=>'boton' , 'style="margin-right:30px"')) !!}</td>

                                    </div>

                                    {!! Form::close() !!}

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


            <div id="push"></div>
        </div>
        <div class="col-md-10">
            <table id="asignaturas"  class="mdl-data-table" cellspacing="0" width="100%">
                @if(isset($invitados))
                    <thead>
                    <tr>
                        <th>Invitado</th>
                        <th>Rol</th>
                        <th>Fecha Registro</th>
                        <th>Último Login</th>
                        <th>Número de Logins </th>

                    </tr>
                    </thead>

                    <tbody id="clickable">

                    @if(!empty($invitados))
                        {{--{{print_r($invitados)}}--}}
                        {{--{!!  $asignaturas=array(json_decode($asignaturas,true)) !!}--}}
                        @foreach ($invitados as $invitado)
                            <tr>
                                <td>{{$invitado->getUsuario()->get()->first()->first_name }}</td>
                                <td>{{$invitado->rol }}</td>
                                <td>{{$invitado->getUsuario()->get()->first()->created_at }}</td>
                                <td>{{$invitado->getUsuario()->get()->first()->last_login }}</td>
                                <td>{{$invitado->numero_accesos }}</td>

                            </tr>

                        @endforeach
                    @endif
                    @endif
                    </tbody>

            </table>


        </div>
        <div class="col-md-2">
           <span class="pull-left">  <strong></strong>
           </span> <span><p><a target="_blank" href="{{route('logAccesos')}}"><button type="button" class="btn btn-raised btn-secondary">LOGS ACCESOS</button></a></p></span>

        </div>
        <footer id="footer">

        </footer>

    </div>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body">
                    <iframe width="700" height="400" src="../js/tinymce/js/tinymce/plugins/responsive_filemanager/filemanager/dialog.php?type=2&field_id=fieldID4'&fldr=" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    </div><!-- /#wrapper -->


@endsection


{{--<script src="/js/jquery-3.3.1.min.js"></script>--}}

{{--<script type="text/javascript">--}}
{{--$(function(){--}}
{{--$('.iframe-btn').fancybox({--}}
{{--'width'	: 1024,--}}
{{--'minHeight'	: 600,--}}
{{--'type'	: 'iframe',--}}
{{--'autoScale'   : true--}}
{{--});--}}
{{--});--}}
{{--</script>--}}
<script>
    $(document).ready(function () {
        // //     $(function(){
        // //         $('.iframe-btn').fancybox({
        // //             'width'	: 1024,
        // //             'minHeight'	: 600,
        // //             'type'	: 'iframe',
        // //             'autoScale'   : true
        // //         });
        // //     });
        //
        // // parent.$.fancybox.close();
        // $('input[name=imagen]').change(function() {
        //
        //
        //
        // });
        // document.getElementById('boton').disabled = true;
        // $('i').on('click',function () {
        //     $('#boton').removeClass('btn btn-info disabled');
        //     $('#boton').addClass('btn btn-success');
        //     document.getElementById('boton').disabled = false;
        //
        //
        // })
        //
        // var tr = $('#clickable');
        //
        // $('#clickable').on('click', function () {
        //
        //
        //     $('#first_name').attr('readonly', false).focus().css("background-color", "#bfe1e847");
        // });
        // $('#clickable1').on('click', function () {
        //     $('#last_name').attr('readonly', false).focus().css("background-color", "#bfe1e847");
        //     ;
        //
        //
        // });
        //
        // $('#clickable2').on('click', function () {
        //
        //     $('#email').attr('readonly', false).focus().css("background-color", "#bfe1e847");
        //     ;
        // });
        // $('#clickable3').on('click', function () {
        //
        //     $('#password').attr('readonly', false).focus().css("background-color", "#bfe1e847").val('');
        //
        //     $('#password_confirmation').attr('readonly', false).css("background-color", "#bfe1e847");
        //
        // });
        // $('#clickableFb').on('click', function () {
        //
        //     $('#fieldIDfacebook').attr('readonly', false).focus().css("background-color", "#bfe1e847")
        //
        //
        //
        // });







    });




</script>
<script>function responsive_filemanager_callback(field_id){
        console.log(field_id);

        var url=jQuery('#'+field_id).val();
        // $('#myModal').modal('hide');


        $('#myimage').attr('src', url);

    }



</script>