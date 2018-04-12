@extends('layouts.layoutAdmin')
<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1 class="">Create a new Post</h1>

            @if (Session::has('message'))
                <div class="alert alert-{{(Session::get('status')=='error')?'danger':Session::get('status')}} " alert-dismissable fade in id="sessions-hide">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{Session::get('status')}}!</strong> {!! Session::get('message') !!}
                </div>
            @endif
            {!! Form::open(array('route' => 'guardar_Hecho', 'method' => 'POST', 'files' => true )) !!}


            <div class="form-group">
                {!! Form::label('title', 'Post Title') !!}
                {!! Form::text('titulo_hecho', Input::old('titulo_hecho'), array('class' => 'form-control', 'placeholder' => 'Title')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Post slug') !!}
                {!! Form::text('proposito', Input::old('proposito'), array('class' => 'form-control', 'placeholder' => 'Proposito')) !!}
            </div>
            <div class="form-group">
                <div class='input-group date' id='fecha_hecho'>

                    {!! Form::label('Tipo de Hecho', 'Tipo de Hecho') !!}
                    <br>
            @foreach($categorias as $categoria)

                        <div style="padding-left: 10px;">

                        {{ Form::radio('categoria_id', $categoria->id) }}
                        {!! Form::label($categoria->id, $categoria->categoria) !!}

                    </div>
            @endforeach
                </div>
            </div>

            <div class="form-group" style="">
                {!! Form::label('Etiquetas', 'Link tags') !!}
                {!! Form::select('etiqueta', $etiqueta, NULL, ['class' => 'form-control chosen-select', 'name' => 'etiqueta[]', 'multiple tabindex' => 6]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('image', 'Upload Image') !!}
                {!! Form::file('imagen') !!}
            </div>
            <div class="form-group">
                {!! Form::label('Curso', 'Curso') !!}

                {!!  Form::select('curso', array('1' => '1º', '2' => '2º' , '3' => '3º' , '4' => '4º' ,'otro' => 'OTRO')); !!}
            </div>

            <div class="form-group" style="">
                {!! Form::label('Curso', 'Curso') !!}

                {!! Form::select('tags', array('IMAGEN' => 'imagen', NULL, ['class' => 'form-control chosen-select', 'name' => 'tags[]', 'multiple tabindex' => 6])) !!}
            </div>
            <div class="form-group">
                {!! Form::label('text', 'Text as Markdown') !!} Click <a href="https://blog.ghost.org/markdown/" target="_blank" >here</a> to get some tips on how to write Markdown.
                {!! Form::textarea('contenido', Input::old('contenido')) !!}

            </div>

            <div class='col-md-5'>
                <label for="Fecha de  Inicio" class="cols-sm-2 control-label">Fecha de Inicio</label>

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar " aria-hidden="true"></i></span>
                    <div class="form-group">
                        {!! Form::text('startDate', Input::old('fecha_fin'), array('class' => 'form-control', 'id'=>'startDate', 'placeholder' => 'dd-mm-YY')) !!}
                    </div>
                </div>
            </div>
            <div class='col-md-5'>
                <label for="Fecha de  Finalizacion" class="cols-sm-2 control-label">Fecha de Finalizacion</label>

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar " aria-hidden="true"></i></span>
                    <div class="form-group">
                        {!! Form::text('endDate', Input::old('fecha_inicio'), array('class' => 'form-control', 'id'=>'endDate', 'placeholder' => 'dd-mm-YY')) !!}


                    </div>

                </div>
                {!! Form::label('text', 'En curso') !!}

                {{ Form::checkbox('en_curso', 'En curso ' ,null, ['class' => 'en_curso'])}}
            </div>
            <div class='col-md-5' style="margin-top: 10px;">

                {!! Form::submit('Confirmar', array('class'=>'btn btn-primary')) !!}

                {!! Form::close() !!}
            </div>
        </div><!-- /.col-md-12 -->
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div><!-- /.row -->




    <script>      $(function() {
            $('.chosen-select').chosen();
            $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
        });</script>



    <!--  jQuery -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script src="/js/tinymce/js/tinymce/jquery.tinymce.min.js"></script>
    <script src="/js/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="/js/tinymce/js/tinymce/init-tinymce.js"></script>
    <script src="/js/tinymce/js/tinymce/langs/es.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script>

        $(document).ready(function () {


            $("#en_curso").change(function() {
                alert(aa);
                });
            });



            $.datepicker.regional['es'] = {
                closeText: 'Cerrar',
                prevText: '< Ant',
                nextText: 'Sig >',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
                weekHeader: 'Sm',
                dateFormat: 'dd/mm/yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
            $.datepicker.setDefaults($.datepicker.regional['es']);
            $(function () {
                document.getElementById("endDate").disabled = true;

                $("#startDate").datepicker({

                    onSelect: function(date) {
                        document.getElementById("endDate").disabled = false;

                        $( "#endDate" ).datepicker("destroy");

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



    </script>
    {{--<script src="{{URL::to('/public/js/tinymce/js/tinymce/tincymce.min.js')}}"> </script>--}}

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
@stop
