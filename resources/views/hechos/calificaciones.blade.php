@extends('layouts.layoutAdmin')
<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">
<style>
    li{
        border: 0px !important;
    }

</style>

<!-- Latest compiled and minified JavaScript -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>--}}

{{--<!-- (Optional) Latest compiled and minified JavaScript translation files -->--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>--}}

@section('content')



    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
                <h1 class="" style="display: none;">{{ $user->first_name  }}</h1>

                <h1 class="" id="categoria"style="display: none;">{!! $categoria->categoria !!}</h1>
                <br>
                <br>





            {{ Form::open(array('route' => 'guardarHecho', 'class' => 'form-style-8','files' => true)) }}

            <div class="col-sm-12" style="" contenteditable="false">



                    <div class="panel panel-info">
                        {{--<nav class="navbar navbar-light" style="background-color: #e3f2fd;">--}}
                            {{--<div class="collapse navbar-collapse" id="navbarColor03">--}}


                            {{--</div>--}}
                        {{--</nav>--}}
                        <div class="panel-body">


                                {!! Form::hidden('categoria_id',$categoria->id, NULL, ['class' => 'form-control','style'=>'width:40%;','id'=>'inputCurso' ,'data-live-search'=>'true','value'=>$curso,'name' => 'curso']) !!}

                                        <div class="form-inline" style="">

                                            {!! Form::label('Curso', 'Curso') !!}<br>
                                                    {!! Form::select('curso', $curso, NULL, ['class' => 'form-control','style'=>'width:40%;','id'=>'inputCurso' ,'data-live-search'=>'true','value'=>$curso,'name' => 'curso']) !!}

                                                    {{--{{Form::select('etiqueta', $c->curso)}}--}}
                                                    {{--{!! Form::select('etiqueta', $curso->asignaturas, NULL, ['class' => 'selectpicker', 'data-live-search'=>'true', 'name' => 'etiqueta[]']) !!}--}}
                                                    {{--{!! Form::select('asignaturas', $curso, NULL, ['class' => 'misDatos','id'=>'asignaturas' ,'data-live-search'=>'true','name' => 'asignatura']) !!}--}}
                                                    <select  style="width:40%;"class="form-control" id="asignaturas" name="asignatura"></select>
                                                    <a id="añadir_asignaturas" href="{{route('misDatosAcademicos')}}"><i  style="    font-size: 26px; cursor: pointer" class="fa fa-plus-circle"></i>
                                                        Añadir Asignaturas</a>
                                        </div>
                                    <hr>
                                    <div class="form-inline" style="">


                                            {!! Form::label('Calificación', 'Calificación') !!}<br>
                                            {!! Form::text('calificacion', null, array('class' => 'form-control','style'=>'width:40%;', 'placeholder' => 'Calificacion')) !!}

                                            {!! Form::text('profesor', null, array('class' => 'form-control','style'=>'width:40%;', 'placeholder' => 'Profesor')) !!}
                                    </div>
                                    <br>
                                    <hr>





                                <br>
                                <hr>
                                    <div class='col-md-12' style="    margin-top: 30px;">
                                        <div class="form-group">
                                            {!! Form::label('text', 'Detalles') !!}
                                            {!! Form::textarea('contenido', Input::old('contenido') , ['style'=>'    margin-top: 0px; margin-bottom: 0px;width: 100%;height: 70px;']) !!}


                                            </div>
                                    </div>
                        </div>
                    </div>
            </div>
        </div>
        <br>
        <br>



                    {{--<div class="panel panel-info">--}}
                        {{--<nav class="navbar navbar-light" style="background-color: #e3f2fd;">--}}
                        {{--<div class="collapse navbar-collapse" id="navbarColor03">--}}


                        {{--</div>--}}
                        {{--</nav>--}}
                        {{--<div class="panel-body">--}}
        <div class="col-md-4">
            <div class="col-sm-12">
                <!--left col-->
                <ul class="list-group">
                    <li class="list-group-item text-left">              <h5 class="card-header">Detalles de la calificacion</h5>
                    </li>
                    <li class="list-group-item text-left"><span class="input-group-addon"><i class="fa fa-calendar " aria-hidden="true"></i></span>

                                                {!! Form::text('startDate',null, array('class' => 'form-control','required'=>'true', 'id'=>'startDate', 'placeholder' => ' Fecha')) !!}
                    </li>

                    <li class="list-group-item text-left">
                        <h5 class="card-header">Etiquetas</h5>
                            <span>{!! Form::select('etiqueta', $etiqueta, null, ['id'=>'etiquetas','class' => 'form-control chosen-select', 'name' => 'etiqueta[]', 'multiple tabindex' => 6]) !!}
                              </span>
                        </li>

                    <li class="list-group-item text-left">
                        <h5 class="card-header">Acceso</h5>
                        <span>{!! Form::select('acceso', array('publico' => 'Publico', 'privado' => 'Privado'), NULL, ['class' => 'form-control' ,'name' => 'acceso']) !!}</span>
                    </li>
                        {{--{{ Form::checkbox('publico', null,null, ['checked'=>'true',--}}
                        {{--'data-toggle'=>'toggle','data-onstyle'=>'success','data-offstyle'=>'danger','id'=>'publico','data-on'=>'Público','data-off'=>'Privado'])}}--}}
                                    {{--<div class='col-md-12'>--}}
                                        {{--<label for="Fecha de  Finalizacion" class="cols-sm-2 control-label">Fecha de Finalizacion</label>--}}

                                        {{--<div class="input-group">--}}
                                            {{--<span class="input-group-addon"><i class="fa fa-calendar " aria-hidden="true"></i></span>--}}
                                            {{--<div class="form-group">--}}
                                                {{--{!! Form::text('endDate', null, array('class' => 'form-control', 'id'=>'endDate', 'placeholder' => 'dd-mm-YY')) !!}--}}


                                            {{--</div>--}}

                                        {{--</div>--}}
                                        {{--{!! Form::label('text', 'En curso') !!}--}}

                                        {{--{{ Form::checkbox('en_curso', 'En curso ' ,null, ['class' => 'en_curso'])}}--}}

                                    {{--</div>--}}



                    </ul>
            </div>
        </div>


                <div class='col-md-12' style="    margin-top: 30px;text-align: center;
                                          margin-left: 200px;">

                    {!! Form::submit('Create Post', array('class'=>'btn btn-info ' ,'id'=>'boton' , 'style="margin-right:30px"')) !!}</td>

                </div>

                {!! Form::close() !!}
            </div>

                <div id="push"></div>
            </div>
            <footer id="footer">

            </footer>

        </div>


        </div><!-- /#wrapper -->

    <!--  jQuery -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script src="/js/tinymce/js/tinymce/jquery.tinymce.min.js"></script>
    <script src="/js/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="/js/tinymce/js/tinymce/init-tinymce.js"></script>
    <script src="/js/tinymce/js/tinymce/langs/es.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <script>      $(function() {
            $('.chosen-select').chosen();
            $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
        });
    </script>

        <script>

        </script>
        <script>
            var editor_config = {
                path_absolute : "{{ URL::to('/') }}/",
            selector : "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            image_advtab: true ,

            external_filemanager_path:"/js/tinymce/js/tinymce/plugins/responsive_filemanager/filemanager/",
            filemanager_title:"Responsive Filemanager" ,
            external_plugins: { "filemanager" : "plugins/responsive_filemanager/filemanager/plugin.min.js"},
            language: 'es',
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.grtElementByTagName('body')[0].clientHeight;
                var cmsURL = editor_config.path_absolute+'laravel-filemanaget?field_name'+field_name;
                if (type = 'image') {
                    cmsURL = cmsURL+'&type=Images';
                } else {
                    cmsUrl = cmsURL+'&type=Files';
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizeble : 'yes',
                    close_previous : 'no'
                });
            }
        };

        tinymce.init(editor_config);
    </script>﻿

<script>

    $(document).ready(function () {

        var sel = document.getElementById('etiquetas');
        var opts = sel.options;
        for (var i=0;i<opts.length;i++) {
            opts[i].value = opts[i].text;
        }
        var sel1 = document.getElementById('inputCurso');
        var opts1 = sel1.options;


        for (var i=0;i<opts1.length;i++) {
            opts1[i].value = opts1[i].text;
        }

        // $('#password').attr('readonly', false).focus().css("background-color", "#bfe1e847").val('');



        var categoria=document.getElementById("categoria").innerHTML;
        if( $('#inputCurso').has('option').length > 0 ) {
            var x = document.getElementById("inputCurso").selectedIndex;
            var curso = (document.getElementsByTagName("option")[x].text);
            $('#inputCurso').attr('value', curso);
            $('#asignaturas').empty();
            $.ajax({
                type: "get",
                url: "{{url('hechos') }}" +"/" +categoria+"/" +curso,
                encode: true,
                data: {
                    curso: curso,
                },
                success: function (response) {
                    console.log(response);
                    if (response.length  == 0) {
                        document.getElementById('boton').disabled = true;
                        // $( '#añadir_asignaturas').show();

                        $('#asignaturas ').hide();
                    }

                    else{
                        $( '#añadir_asignaturas').hide();

                        $('#boton').removeClass('btn btn-info disabled');
                        $('#boton').addClass('btn btn-success');
                        document.getElementById('boton').disabled = false;
                        document.getElementById('boton').disabled = false;
                        response.forEach(function (element) {


                            $('#asignaturas')
                                .append($("<option></option>")
                                    .attr("value", element)
                                    .text(element));
                        });
                    }



                    {{--window.location.href = "{{url('hechos') }}" +"/" +categoria+"/" +curso--}}
                },
                error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        }




        $('#inputCurso').on('change', function() {
            var x = document.getElementById("inputCurso").selectedIndex;
            var x = document.getElementById("inputCurso").selectedIndex;
            var pathArray = window.location.pathname.split( '/,' );
            var secondLevelLocation = pathArray[0];

            var curso=(document.getElementsByTagName("option")[x].text);
            $('#inputCurso').attr('value',curso);
            $('#asignaturas').empty();
            $.ajax({
                type:"get",
                url: "{{url('hechos') }}" +"/" +categoria+"/" +curso,
                encode  : true,
                data: {
                    curso: curso,
                },
                success: function(response){ // What to do if we succeed
                    if (response.length  == 0) {
                        document.getElementById('boton').disabled = true;
                        $( '#añadir_asignaturas').show();

                        $('#asignaturas ').hide();
                    }

                    else{
                        $( '#añadir_asignaturas').hide();
                        $('#asignaturas ').show();

                        $('#boton').removeClass('btn btn-info disabled');
                        $('#boton').addClass('btn btn-success');
                        document.getElementById('boton').disabled = false;
                        document.getElementById('boton').disabled = false;
                        response.forEach(function(element) {
                            $('#asignaturas')
                                .append($("<option></option>")
                                    .attr("value",element)
                                    .text(element));
                        });

                    }




        console.log(response);

                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });

        });




        $.datepicker.setDefaults($.datepicker.regional['es']);
        $(function () {
            // document.getElementById("endDate").disabled = true;

            $("#startDate").datepicker({

                    onSelect: function(date) {
                        // document.getElementById("endDate").disabled = false;
                        //
                        // $("#endDate" ).datepicker("destroy");
                        //
                        // $("#endDate").datepicker({
                        //     minDate: date,
                        //     inline : false
                        //
                        // })
                        // $( "#endDate" ).datepicker("refresh");
                        // $("#endDate").datepicker('setDate', null);

                    },

                }




            );

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
    <script>
        $('.en_curso').change(function(ev) {
            if ( $(this).is(':checked') ) {
                document.getElementById("endDate").disabled = true;
            }
            else {

                $("#endDate").datepicker({
                    inline : false

                })
                $( "#endDate" ).datepicker("refresh");

                document.getElementById("endDate").disabled = false;
            }

        });
    </script>
    <script>

        $(document).ready(function() {




        });

    </script>
@stop
