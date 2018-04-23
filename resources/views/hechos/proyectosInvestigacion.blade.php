@extends('layouts.layoutAdmin')
<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">


<!-- Latest compiled and minified JavaScript -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>--}}

{{--<!-- (Optional) Latest compiled and minified JavaScript translation files -->--}}
@section('content')





    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h1 class="" style="display: none;">{{ $user->first_name  }}</h1>

            <h1 class="" id="categoria"style="display: none;">{!! $categoria->categoria !!}</h1>
            <br>
            <br>





            {{ Form::open(array('route' => 'guardarHecho', 'class' => 'form-style-8','files' => true,'onsubmit'=>'vincularAsign();')) }}

            <div class="col-sm-12" style="" contenteditable="false">



                <div class="panel panel-info">

                    <div class="panel-body">


<<<<<<< HEAD
                        {!! Form::hidden('categoria_id',$categoria->id, NULL, ['class' => 'form-control','style'=>'width:40%;','id'=>'curso' ,'data-live-search'=>'true','value'=>$grado,'name' => 'curso1']) !!}
                        {{--<input hidden name="categoria_id" value="{{$categoria->id}}">--}}
=======
                        {!! Form::hidden('categoria_id',$categoria->id, NULL, ['class' => 'form-control','style'=>'width:40%;' ,'data-live-search'=>'true','value'=>$curso,'name' => 'curso1']) !!}
>>>>>>> 55838f397988dacf6de50eff954b607dc912bd9a

                        <div class="form-inline" >

                            {!! Form::label('Titulo', 'Titulo') !!}<br>
                            {!! Form::text('titulo_hecho', Input::old('titulo_hecho'), array('required','class' => 'form-control','style'=>'width: 100%', 'placeholder' => 'Título')) !!}
                        </div>

                        <br>
                        <hr>
                        <div class="form-inline" >
                            <div class="alert alert-info">

                            <input type="checkbox" id="vincular"  class="form-control" name="vincular" value="vincular">  Te gustaría vincular a alguna asignatura ?<br>
                        </div>
                        </div>

                        <div class="form-inline" id="asigAlumno"style="">

                            {!! Form::label('Curso', 'Curso - Asignatura') !!}<br>

                            {!! Form::select('grado', $grado, NULL, ['class' => 'form-control','style'=>'width:40%;','id'=>'inputGrado' ,'data-live-search'=>'true','value'=>$grado,'name' => 'grado']) !!}
                            {{--<select  style="width:40%;"class="form-control" id="curso" name="curso" ></select>--}}

                            {!! Form::select('curso', $curso, NULL, ['class' => 'form-control','style'=>'width:40%;','id'=>'inputCurso','required'=>'true' ,'data-live-search'=>'true','name' => 'curso']) !!}
                            {{--<select  style="width:40%;"class="form-control" id="asignaturas" name="asignatura"></select>--}}

                            <a id="añadir_asignaturas" href="{{route('misDatosAcademicos')}}"><i  style="    font-size: 26px; cursor: pointer" class="fa fa-plus-circle"></i>
                                Añadir Asignaturas</a>
                        </div>
                        <hr>
                        <div class="custom-file">
                            <label class="custom-file-label" for="customFile">Añadir archivo( .pdf .txt .word)</label>
                            <a data-toggle="modal" href="" data-target="#myModal2" class="iframe-btn" type="button">

                                <input type="text" name="ruta_archivo" class="form-control" id="mipdf"></a>
                        </div>


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


        <div class="col-md-4">
            <div class="col-sm-12">
                <!--left col-->
                <ul class="list-group">
                    <li class="list-group-item text-left">              <h5 class="card-header">Detalles </h5>
                    </li>
                    <li class="list-group-item text-left"><span class="input-group-addon"><i class="fa fa-calendar " aria-hidden="true"></i></span>

                        {!! Form::text('startDate',null, array('class' => 'form-control','required'=>'true', 'id'=>'startDate', 'placeholder' => ' Fecha')) !!}
                    </li>
                    <li class="list-group-item text-left"><span class="input-group-addon"><i class="fa fa-calendar " aria-hidden="true"></i></span>

                        {!! Form::text('endDate', null, array('class' => 'form-control', 'id'=>'endDate', 'placeholder' => 'dd-mm-YY')) !!}
                        En curso {{ Form::checkbox('en_curso', 'En curso ' ,null, ['class' => 'en_curso'])}}

                    </li>
                    <li class="list-group-item text-left">
                        <h5 class="card-header">Etiquetas</h5>
                        {!! Form::select('etiqueta', $etiqueta, null, ['id'=>'etiquetas','data-placeholder'=>"Añade una etiqueta",'class' => 'form-control chosen-select', 'name' => 'etiqueta[]', 'multiple tabindex' => 6]) !!}
                    </li>
                    <li class="list-group-item text-left">
                        <h5 class="card-header">Proposito</h5>
                        {!! Form::text('proposito', null, array('class' => 'form-control','required', 'placeholder' => 'proposito')) !!}
                    </li>
                    <li class="list-group-item text-left">
                        <h5 class="card-header">Evidencia</h5>
                        <a data-toggle="modal" href="" data-target="#myModal" class="iframe-btn" type="button">
                            <img  id="myimage" title="profile image" src="https://www.metatube.com/assets/metatube/video/img/Upload.svg" class="img-circle img-responsive" name="evidencia">
                        </a>                    </li>
                    <li class="list-group-item text-left">
                        <h5 class="card-header">Acceso</h5>
                        <span>{!! Form::select('acceso', array('publico' => 'Publico', 'privado' => 'Privado'), NULL, ['class' => 'form-control' ,'name' => 'acceso']) !!}</span>
                    </li>
                    {!! Form::text('evidencia',null, ['id'=>'fieldID4','class' => 'misDatos','readonly' => 'true','style'=>'display:none;' ]) !!}
                    {!! Form::text('ruta_archivo',null, ['id'=>'fieldID3','class' => 'misDatos','readonly' => 'true','style'=>'display:none;' ]) !!}


                    <li class="list-group-item text-left" style="height: auto;">

                        <span>     {!! Form::submit('Confirmar', array('class'=>'btn btn-info btn-lg btn-block' ,'id'=>'boton' , 'style="margin-right:30px"')) !!}</span>
                    </li>


                </ul>
            </div>
        </div>


        {!! Form::close() !!}
    </div>

    <div id="push"></div>
    </div>
    <footer id="footer">

    </footer>

    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->

            <iframe width="700" height="400" src="../js/tinymce/js/tinymce/plugins/responsive_filemanager/filemanager/dialog.php?type=1&field_id=fieldID4'&fldr=" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>
    </div>
    <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->

            <iframe width="700" height="400" src="../js/tinymce/js/tinymce/plugins/responsive_filemanager/filemanager/dialog.php?type=2&field_id=fieldID3'&fldr=" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>
    </div>
    <div  data-backdrop="static" data-keyboard="false" class="modal fade" id="myModal12" role="dialog">
        <div class="modal-dialog" style="width: 1000px ;  ">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4  class="alert alert-danger" >Perfil académico sin completar.</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker2'>
                            <span class="input-group-addon">

                        <img width="900" src="/imagenes/capturaProfesionales.png"/>
                                <br>
                                <hr>
                                                                <p class="text-info" style="font-size: 16px"><a href="{{route('misDatosAcademicos')}}#forma">Por favor , agregue al menos una Titulacion Académica y Curso  a su trayectoria .</a></p>

                    </span>
                        </div>

                    </div>

                    <div class="modal-footer">
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div><!-- /#wrapper -->






    <!--  jQuery -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    {{--<script src="https://code.jquery.com/jquery-1.9.1.js"></script>--}}
    <script src="https://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script src="/js/tinymce/js/tinymce/jquery.tinymce.min.js"></script>
    <script src="/js/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="/js/tinymce/js/tinymce/init-tinymce.js"></script>
    <script src="/js/tinymce/js/tinymce/langs/es.js"></script>
    <script src="/js/datepickerSpanish.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <script>      $(function() {
            $('.chosen-select').chosen();
            $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
        });
    </script>

    <script>
        function vincularAsign() {
            if (document.getElementById('vincular').checked) {
                $('#asigAlumno').show();

            } else {
                document.getElementById("inputGrado").value = "";
                document.getElementById("inputCurso").value = "";
                alert("aa");
                $('#asigAlumno').hide();
            }
        }
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
            height : "250",
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
            $('#asigAlumno').hide();

            $("#vincular").on('change',function(){
                if (document.getElementById('vincular').checked)
                {
                    $('#asigAlumno').show();
                } else {
                    $('#inputGrado').attr('value', null);
                    $('#inputCurso').attr('value', null);
                    $('#asigAlumno').hide();
                }
            });



            // $('#password').attr('readonly', false).focus().css("background-color", "#bfe1e847").val('');


            $.datepicker.setDefaults($.datepicker.regional['es']);
            $(function () {
                document.getElementById("endDate").disabled = true;

                $("#startDate").datepicker({

                        onSelect: function(date) {
                            document.getElementById("endDate").disabled = false;

                            $("#endDate" ).datepicker("destroy");

                            $("#endDate").datepicker({
                                minDate: date,
                                inline : false

                            })
                            $( "#endDate" ).datepicker("refresh");
                            $("#endDate").datepicker('setDate', null);

                        },

                    }




                );

            });


<<<<<<< HEAD

        });




    </script>
    <script>function responsive_filemanager_callback(field_id){
            console.log(field_id);

            var url=jQuery('#'+field_id).val();
            // $('#myModal').modal('hide');
            console.log(url);

            if(field_id=='fieldID3'){
                $('#mipdf').attr('value', url);

            }
            else {
                $('#myimage').attr('src', url);
            }
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
    $(document).ready(function () {

    var sel = document.getElementById('etiquetas');
    var opts = sel.options;
    for (var i=0;i<opts.length;i++) {
    opts[i].value = opts[i].text;
    }
    var sel1 = document.getElementById('inputGrado');
    var opts1 = sel1.options;

    for (var i=0;i<opts1.length;i++) {
    opts1[i].value = opts1[i].text;
    }

    var sel1 = document.getElementById('inputCurso');
    var opts1 = sel1.options;


    for (var i=0;i<opts1.length;i++) {
    opts1[i].value = opts1[i].text;
    }
    if(($("#inputgGrado").children('option').length) >0) {
    }


    var categoria=document.getElementById("categoria").innerHTML;
    if( $('#inputGrado').has('option').length > 0 ) {

    var e = document.getElementById("inputGrado");
    var grado = e.options[e.selectedIndex].value;
    var grado = e.options[e.selectedIndex].value;



    var e2 = document.getElementById("inputCurso");
    // var x = document.getElementById("cursoSelect").selectedIndex;
    // var curso = e2.options[e2.selectedIndex];
    var e3 = document.getElementById("inputCurso").options.length;
    if(e3==0){
    $('#myModal12').modal('show', { backdrop: 'static',
    keyboard: false});

    }


    $('#inputGrado').attr('value', grado);

    $('#inputCurso').empty();

    $.ajax({
    type:"get",
    url: "{{url('get') }}" +"/",
    dataType: 'json',
    cache: false,
    data: {
    grado: grado,
    },
    success: function(response){ // What to do if we succeed
    if (response.length  == 0) {
    document.getElementById('boton').disabled = true;
    $('#añadir_asignaturas').show();

    $('#asignaturas ').hide();
    }
    else{
    $( '#añadir_asignaturas').hide();
    $('#asignaturas ').show();

    $('#boton').removeClass('btn btn-info disabled');
    $('#boton').addClass('btn btn-success');
    document.getElementById('boton').disabled = false;
    document.getElementById('boton').disabled = false;
    console.log(( typeof  response) );
    response.forEach(function (element) {
=======
            var sel = document.getElementById('etiquetas');
            var opts = sel.options;
            for (var i=0;i<opts.length;i++) {
                opts[i].value = opts[i].text;
            }
            var sel1 = document.getElementById('inputGrado');
            var opts1 = sel1.options;

            for (var i=0;i<opts1.length;i++) {
                opts1[i].value = opts1[i].text;
            }
            for (var i=0;i<opts1.length;i++) {
                opts1[i].value = opts1[i].text;
                // alert(opts1[i].text);
            }
            var e3 = document.getElementById("inputCurso").options.length;
            if(e3==0){
                $('#myModal12').modal('show', { backdrop: 'static',
                    keyboard: false});

            }

            if( $('#inputGrado').has('option').length > 0 ) {


                var categoria=document.getElementById("categoria").innerHTML;

                    var e = document.getElementById("inputGrado");
                    var grado = e.options[e.selectedIndex].value;
                    var grado = e.options[e.selectedIndex].value;
                    var e2 = document.getElementById("inputCurso");
                    var e3 = document.getElementById("inputCurso").options.length;
                    if(e3==0){
                        $('#myModal12').modal('show', { backdrop: 'static',
                            keyboard: false});

                    }


                    $('#inputGrado').attr('value', grado);

                    $('#inputCurso').empty();
>>>>>>> 55838f397988dacf6de50eff954b607dc912bd9a

                    $.ajax({
                        type:"get",
                        url: "{{url('get') }}" +"/",
                        dataType: 'json',
                        cache: false,
                        data: {
                            grado: grado,
                        },
                        success: function(response){ // What to do if we succeed
                            if (response.length  == 0) {
                                document.getElementById('boton').disabled = true;
                                $('#añadir_asignaturas').show();

<<<<<<< HEAD
    $('#inputCurso')
    .append($("<option></option>")
    .attr("value", element)
    .text(element));
=======
                                $('#asignaturas ').hide();
                            }
                            else{
                                $( '#añadir_asignaturas').hide();
                                $('#asignaturas ').show();
>>>>>>> 55838f397988dacf6de50eff954b607dc912bd9a

                                $('#boton').removeClass('btn btn-info disabled');
                                $('#boton').addClass('btn btn-success');
                                document.getElementById('boton').disabled = false;
                                document.getElementById('boton').disabled = false;
                                console.log(( typeof  response) );
                                response.forEach(function (element) {

    });
    }

                                    $('#inputCurso')
                                        .append($("<option></option>")
                                            .attr("value", element)
                                            .text(element));


<<<<<<< HEAD

    console.log(response);
=======
                                });
                            }

>>>>>>> 55838f397988dacf6de50eff954b607dc912bd9a

    },
    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
    console.log(JSON.stringify(jqXHR));
    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
    });


<<<<<<< HEAD
    }



=======
                            console.log(response);

                        },
                        error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                            console.log(JSON.stringify(jqXHR));
                            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                        }
                    });


                }
>>>>>>> 55838f397988dacf6de50eff954b607dc912bd9a


    $('#inputGrado').on('change', function() {

    var e = document.getElementById("inputGrado");
    var grado = e.options[e.selectedIndex].value;
    var grado = e.options[e.selectedIndex].value;
    var pathArray = window.location.pathname.split( '/,' );

    // var curso=(document.grado("option")[x].text);
    $('#inputGrado').attr('value',grado);
    // $('#asignaturas').empty();
    // $('#curso').empty();
    $('#inputCurso').empty();

    $.ajax({
    type:"get",
    url: "{{url('get') }}" +"/",
    dataType: 'json',
    cache: false,
    data: {
    grado: grado,
    },
    success: function(response){ // What to do if we succeed
    if (response.length  == 0) {
    document.getElementById('boton').disabled = true;
    $('#añadir_asignaturas').show();
    $('#myModal12').modal('show');

    $('#asignaturas ').hide();
    }
    else{
    $( '#añadir_asignaturas').hide();
    $('#asignaturas ').show();

    $('#boton').removeClass('btn btn-info disabled');
    $('#boton').addClass('btn btn-success');
    document.getElementById('boton').disabled = false;
    document.getElementById('boton').disabled = false;
    console.log(( typeof  response) );

<<<<<<< HEAD
    response.forEach(function (element) {
=======
                                $('#inputCurso')
                                    .append($("<option></option>")
                                        .attr("value", element)
                                        .text(element));
>>>>>>> 55838f397988dacf6de50eff954b607dc912bd9a


    $('#inputCurso')
    .append($("<option></option>")
    .attr("value", element)
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







    {{--$('#inputCurso').click( function() {--}}

    {{--var e = document.getElementById("inputGrado");--}}
    {{--var grado = e.options[e.selectedIndex].value;--}}
    {{--var grado = e.options[e.selectedIndex].value;--}}
    {{--var pathArray = window.location.pathname.split( '/,' );--}}
    {{--var secondLevelLocation = pathArray[0];--}}
    {{--var e2 = document.getElementById("inputCurso");--}}
    {{--var curso = e2.options[e2.selectedIndex].value;--}}

    {{--// var curso=(document.grado("option")[x].text);--}}
    {{--$('#inputGrado').attr('value',grado);--}}
    {{--$('#asignaturas').empty();--}}
    {{--// $('#curso').empty();--}}

    {{--$.ajax({--}}
    {{--type:"get",--}}
    {{--url: "{{url('hechos') }}" +"/" +categoria+"/" +grado +"/"+curso,--}}
    {{--encode  : true,--}}
    {{--data: {--}}
    {{--grado: grado,--}}
    {{--curso: curso,--}}
    {{--},--}}
    {{--success: function(response){ // What to do if we succeed--}}
    {{--if (response.length  == 0) {--}}
    {{--document.getElementById('boton').disabled = true;--}}
    {{--$( '#añadir_asignaturas').show();--}}

    {{--$('#asignaturas ').hide();--}}

    {{--}--}}

    {{--else{--}}
    {{--$( '#añadir_asignaturas').hide();--}}
    {{--$('#asignaturas ').show();--}}

    {{--$('#boton').removeClass('btn btn-info disabled');--}}
    {{--$('#boton').addClass('btn btn-success');--}}
    {{--document.getElementById('boton').disabled = false;--}}
    {{--document.getElementById('boton').disabled = false;--}}

    {{--response.forEach(function (element) {--}}


    {{--$('#asignaturas')--}}
    {{--.append($("<option></option>")--}}
    {{--.attr("value", element)--}}
    {{--.text(element));--}}
    {{--});--}}

    {{--}--}}




    {{--console.log(response);--}}

    {{--},--}}
    {{--error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail--}}
    {{--console.log(JSON.stringify(jqXHR));--}}
    {{--console.log("AJAX error: " + textStatus + ' : ' + errorThrown);--}}
    {{--}--}}
    {{--});--}}

    {{--});--}}




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
            console.log(url);

            if(field_id=='fieldID3'){
                $('#mipdf').attr('value', url);

            }
            else {
                $('#myimage').attr('src', url);
            }
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







    </script>

@stop
