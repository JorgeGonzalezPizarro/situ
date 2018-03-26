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
</style>
@section('content')

    <div class="container target">
        <div class="row">
            {{--{{ Form::open(array('route' => 'actualizarDatosAcademicos', 'class' => 'form-style-8','files' => true)) }}--}}


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


            {{ Form::open(array('route' => 'actualizarDatosAcademicos', 'class' => 'form-style-8','files' => true)) }}


            <div class="col-sm-12" style="" contenteditable="false">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad">


                    <div class="panel panel-info">


                        <div class="panel-body">
                            <div class="row">



                                <div class=" col-md-12 col-lg-12 ">

                                    <table class="table table-user-information" id="mitabla">
                                        <div class="input-append">

                                            {{--<input id="fieldID4" type="text" name="imagen" style="display: none;">--}}
                                            {!! Form::text('imagen', null, ['id'=>'fieldID4','class' => 'misDatos','readonly' => 'true','style'=>'display:none;' ]) !!}

                                        </div>
                                        <tbody id="tbody">
                                        <th style="border: none;"><h1>Asignaturas</h1></th>
                                        <tr>
                                            <td><strong class="">Grado:</strong></td>
                                            <td>
                                                {{--{!! Form::text('grado', null, ['id'=>'first_name','class' => 'misDatos','readonly' => 'true','value '=> $curso->grado ]) !!}--}}
                                                {{ Form::select('grado', $grado, ['class' => '','id'=>'grado','value'=>$grado]) }}

                                                <a id="añadir_asignaturas" href="<?php echo e(route('misDatosLaborales')); ?>"><i  style="    font-size: 26px; cursor: pointer" class="fa fa-plus-circle"></i>
                                                    Añadir Formacion</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="">Curso:</strong></td>
                                            <td>
                                                {{ Form::select('curso', ['1'=>'1º','2'=>'2º','3'=>'3º','4'=>'4º','5'=>'OTROS'], ['class' => 'misDatos','id'=>'curso']) }}


                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="">Agregar Asignatura:</strong></td>
                                            <td>{!! Form::text('asignatura[]',"", ['id'=>'asignatura','class' => 'misDatos','required'=>'true' ]) !!}




                                                <a  id="mas"  value="" onclick="addInput();"  >
                                                    <i  style="    font-size: 26px; cursor: pointer" class="fa fa-plus-circle"></i>

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

                                        </tr>


                                        <input class="field" name="old_password"  id="old_password" type="hidden" value="{{$user->password}}">


                                        </tbody>

                                    </table>
                                    <tr>

                                        <td>     {!! Form::submit('Actualizar', array('class'=>'btn btn-primary' , 'id'=>'boton','style="margin-right:30px"')) !!}</td>
                                        </td>
                                    </tr>
                                    {{ Form::close() }}


                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="panel-footer">
                        <table id="asignaturas"  class="mdl-data-table" cellspacing="0" width="100%">
                            {!! Form::label('text', 'Curso Académico') !!}
                            {{ Form::select('', $grado, $year,
                            ['aria-controls'=>'asignaturas','class' => 'form-control input-sm','onChange'=>'getAsignaturas()' ,'id'=>'cursoSelect']) }}

                        @if(isset($curso))
                                <thead>
                                <tr>
                                    <th>Grado</th>
                                    <th>Curso</th>
                                    <th>Asignatura</th>
                                    {{--<th>Seleccionar</th>--}}
                                </tr>
                                </thead>

                                <tbody id="clickable">
                                <div class="form-group">

                                </div>
                                @foreach($curso as $cur)


                                    @if(!empty($cur->asignaturas))
                                    {{--{!!  $asignaturas=array(json_decode($asignaturas,true)) !!}--}}
                                    {{--@foreach ($cur->asignaturas as $asignatura)--}}
                                    @foreach(json_decode(($cur->asignaturas),false) as $as)
                                        <tr>
                                            <td>{{$cur->grado}}</td>

                                            <td>{{$cur->curso}}</td>
                                            <td id="asignatura">
                                           {!!  $as  !!}
                                            {{--<td id="seleccionar"> <a data-original-title="Remove this user" data-toggle="tooltip" type="button"--}}
                                                                     {{--class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a></td>--}}
                                            </td>
                                        </tr>
                                    @endforeach

                                    {{--@endforeach--}}
                                @endif
                                @endforeach

                                @endif
                                </tbody>

                        </table>


                    </div>

                </div>
            </div>
            </div>


        {{--<footer id="footer">--}}
            {{--<div class="row-fluid">--}}
                {{--<div class="span3">--}}
                    {{--<p>--}}
                        {{--<a href="http://twitter.com/Bootply" rel="nofollow" title="Bootply on Twitter" target="ext">Twitter</a><br>--}}
                        {{--<a href="https://plus.google.com/+Bootply" rel="publisher">Google+</a><br>--}}
                        {{--<a href="http://facebook.com/Bootply" rel="nofollow" title="Bootply on Facebook" target="ext">Facebook</a><br>--}}
                        {{--<a href="https://github.com/iatek/bootply" title="Bootply on GitHub" target="ext">GitHub</a><br>--}}
                    {{--</p>--}}
                {{--</div>--}}
                {{--<div class="span3">--}}
                    {{--<p>--}}
                        {{--<a data-toggle="" role="button" href="">Contact Us</a><br>--}}
                        {{--<a href="/tags">Tags</a><br>--}}
                        {{--<a href="/bootstrap-community">Community</a><br>--}}
                        {{--<a href="/upgrade">Upgrade</a><br>--}}
                    {{--</p>--}}
                {{--</div>--}}
                {{--<div class="span3">--}}
                    {{--<p>--}}
                        {{--<a href="http://www.bootbundle.com" target="ext" rel="nofollow">BootBundle</a><br>--}}
                        {{--<a href="https://bootstrapbay.com/?ref=skelly" target="_ext" rel="nofollow"--}}
                           {{--title="Premium Bootstrap themes">Bootstrap Themes</a><br>--}}
                        {{--<a href="http://www.bootstrapzero.com" target="_ext" rel="nofollow"--}}
                           {{--title="Free Bootstrap templates">BootstrapZero</a><br>--}}
                        {{--<a href="http://upgrade-bootstrap.bootply.com/">2.x Upgrade Tool</a><br>--}}
                    {{--</p>--}}
                {{--</div>--}}
                {{--<div class="span3">--}}
                    {{--<span class="pull-right">©Copyright 2013-2014 <a href="/"--}}
                                                                     {{--title="The Bootstrap Playground">Bootply</a> | <a--}}
                                {{--href="/about#privacy">Privacy</a></span>--}}
                    {{--<a href="../js/tinymce/js/tinymce/plugins/responsive_filemanager/filemanager/dialog.php?type=2&field_id=fieldID4'&fldr=" class="btn iframe-btn" type="button">Open Filemanager</a>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</footer>--}}

    </div>


    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body">
                    <iframe width="700" height="400" src="/js/tinymce/js/tinymce/plugins/responsive_filemanager/filemanager/dialog.php?type=2&field_id=fieldID4'&fldr=" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>



{{--<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />--}}
{{--<script src="https://code.jquery.com/jquery-1.9.1.js"></script>--}}
{{--<script src="https://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>--}}

<script>
    $(document).ready(function () {

    });
</script>
<script>function responsive_filemanager_callback(field_id){
        console.log(field_id);

        var url=jQuery('#'+field_id).val();
        // $('#myModal').modal('hide');


        $('#myimage').attr('src', url);

    }



</script>
<script>


    var counter = 1;
    var limit = 3;
    function addInput(){

            var newdiv = document.createElement('tr');
            newdiv.innerHTML =  "<td><strong class=''>Asignatura:</strong></td> <td><br><input type='text' class='misDatos' name='asignatura[]'></td>";
            document.getElementById("tbody").appendChild(newdiv);

            counter++;

    }

        var e = document.getElementById("cursoSelect");
        var strUser = e.options[e.selectedIndex].value;
        // var x = document.getElementById("cursoSelect").selectedIndex;
        var curso = e.options[e.selectedIndex].value;

        $.ajax({
            type:"get",
            url     : "{{ url('Alumno/alumnoDatos/datosAcademicos/') }}/"+curso ,
            encode  : true,
            data: {
                curso: curso,
            },
            success: function(response){ // What to do if we succeed
                {{--window.location.href= "{{ route('misDatosAcademicos') }}"+"/"+curso;--}}
                console.log(response);

            },
            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });



    function getAsignaturas () {
        var e = document.getElementById("cursoSelect");
        var strUser = e.options[e.selectedIndex].value;
        // var x = document.getElementById("cursoSelect").selectedIndex;
        var curso = e.options[e.selectedIndex].value;

        $.ajax({
            type:"get",
            url     : "{{ url('Alumno/alumnoDatos/datosAcademicos/') }}/"+curso ,
            encode  : true,
            data: {
                curso: curso,
            },
            success: function(response){ // What to do if we succeed
                window.location.href= "{{ route('misDatosAcademicos') }}"+"/"+curso;
                console.log(response);

            },
            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });



    }



</script>

<script>

    $(document).ready(function() {
        document.getElementById('boton').disabled = true;
        $('i').on('click',function () {
            $('#boton').removeClass('btn btn-info disabled');
            $('#boton').addClass('btn btn-success');
            document.getElementById('boton').disabled = false;


        })
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

        $('#clickable2').on('click', function () {

            $('#email').attr('readonly', false).focus().css("background-color", "#bfe1e847");
            ;
        });
        $('#clickable3').on('click', function () {

            $('#password').attr('readonly', false).focus().css("background-color", "#bfe1e847").val('');

            $('#password_confirmation').attr('readonly', false).css("background-color", "#bfe1e847");

        });
        var table=$('#asignaturas').DataTable({
            "scrollX": false,
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": false,
            "bInfo": false,
            "bAutoWidth": true,
            "language": {
                "lengthMenu": "Ver _MENU_ Número de registros por página",
                "zeroRecords": "No encontrado",
                "info": "Página  _PAGE_ de  _PAGES_",
                "infoEmpty": "No hay registros disponibles",

                "infoFiltered": "(filtered from _MAX_ Total de usuarios)",
                "paginate": {
                    "first":      "Primero",
                    "previous":   "Anterior",
                    "next":       "Siguiente",
                    "last":       "Último"
                },
                "search":         "Buscar &nbsp;:",

            },
            "columnDefs": [ {
                "targets": 1,
                "searchable": true
            } ]
        });


        var x = document.getElementById("cursoSelect").selectedIndex;
        var curso=(document.getElementsByTagName("option")[x].value);
        $('#asignaturas').on('click', 'td a ', function (e) {
            e.preventDefault();
            var table = $('#asignaturas').DataTable();

            var data = table.row($(this).closest('tr')).data()
            var x = document.getElementById("cursoSelect").selectedIndex;
            var curso=(document.getElementsByTagName("option")[x].value);

            $.ajax({
                type:"get",
                url     : "{{ route('eliminarAsignatura') }}/"+data[2]+"/"+ data[1]+"/"+data[0],
                encode  : true,

                data: {
                    // asignatura: data[2],
                    // year:data[1],
                    // curso:data[0]
                },
                success: function(response){
                    window.location.href= "{{ route('misDatosAcademicos') }}"+"/"+curso;
                    alert(data[1]);
                    console.log(response);

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });



        });
    });


</script>
@endsection
