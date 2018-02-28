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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>

@section('content')




    <div class="container target">
        <div class="row">
            {{ Form::open(array('route' => 'actualizarDatos', 'class' => 'form-style-8','files' => true)) }}


            <div class="col-sm-12">
                <h1 class="" style="text-align: center">{{ $user->first_name  }}</h1>

                <h1 class="" style="text-align: center">Mis Calificaciones</h1>
                <br>
                <br>
            </div>
        </div>




        <div class="row">


            <div class="col-sm-12" style="" contenteditable="false">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad">


                    <div class="panel panel-info">
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
                                        <a class="nav-link" href="#">Profesionales</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Otros datos</a>
                                    </li>
                                </ul>

                            </div>
                        </nav>
                        <div class="panel-body">
                            <div class="row">



                                <div class='col-md-8' style="    margin-top: 10px;
                                      margin-left: 240px;">
                                        <div class="form-inline" style="">

                                                <div style="text-align: center;">
                                                    {!! Form::label('Curso', 'Curso') !!}
                                                    {!! Form::select('curso', $curso, NULL, ['class' => 'form-control','style'=>'width:40%;','id'=>'inputCurso' ,'data-live-search'=>'true','value'=>$curso,'name' => 'curso']) !!}

                                                    {{--{{Form::select('etiqueta', $c->curso)}}--}}
                                                    {{--{!! Form::select('etiqueta', $curso->asignaturas, NULL, ['class' => 'selectpicker', 'data-live-search'=>'true', 'name' => 'etiqueta[]']) !!}--}}
                                                    {{--{!! Form::select('asignaturas', $curso, NULL, ['class' => 'misDatos','id'=>'asignaturas' ,'data-live-search'=>'true','name' => 'asignatura']) !!}--}}
                                                    <select  style="width:40%;"class="form-control" id="asignaturas"></select>

                                                </div>
                                        </div>
                                            <div class="form-inline" style="margin-top: 40px;">
                                                <div style=" text-align: center">


                                            {!! Form::label('Calificacion', 'Calificacion') !!}
                                            {!! Form::text('Calificacion', null, array('class' => 'form-control', 'placeholder' => 'Calificacion')) !!}

                                            {!! Form::label('Profesor', 'Profesor') !!}
                                            {!! Form::text('Profesor', null, array('class' => 'form-control', 'placeholder' => 'Profesor')) !!}
                                            </div>
                                            </div>
                                    <div class='col-md-6' style="    margin-top: 30px;text-align: center;
                                      margin-left: 200px;">

                                        {!! Form::submit('Create Post', array('class'=>'btn btn-info disabled' ,'id'=>'boton' , 'style="margin-right:30px"')) !!}</td>

                                    </div>

                                    {!! Form::close() !!}

                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">


                        </div>

                    </div>
                </div>
            </div>


            <div id="push"></div>
        </div>
        <footer id="footer">

        </footer>

    </div>


    </div><!-- /#wrapper -->



@endsection



<script>
    $(document).ready(function () {
        if( $('#inputCurso').has('option').length > 0 ) {
            var x = document.getElementById("inputCurso").selectedIndex;
            var curso = (document.getElementsByTagName("option")[x].text);
            $('#inputCurso').attr('value', curso);
            $('#asignaturas').empty();
            $.ajax({
                type: "get",
                url: "{{ route('getAsignaturas') }}/" + curso,
                encode: true,
                data: {
                    curso: curso,
                },
                success: function (response) { // What to do if we succeed
                    response.forEach(function (element) {
                        $('#asignaturas')
                            .append($("<option></option>")
                                .attr("value", element)
                                .text(element));
                    });


                    console.log(response);

                },
                error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        }




        $('#inputCurso').on('change', function() {
            var x = document.getElementById("inputCurso").selectedIndex;
            var curso=(document.getElementsByTagName("option")[x].text);
            $('#inputCurso').attr('value',curso);
            $('#asignaturas').empty();
            $.ajax({
                type:"get",
                url     : "{{ route('getAsignaturas') }}/" +curso,
                encode  : true,
                data: {
                    curso: curso,
                },
                success: function(response){ // What to do if we succeed
                    response.forEach(function(element) {
                        $('#asignaturas')
                            .append($("<option></option>")
                                .attr("value",element)
                                .text(element));
                    });


        console.log(response);

                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });

        });



        document.getElementById('boton').disabled = true;
        $('i').on('click',function () {
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
        $('#clickableFb').on('click', function () {

            $('#fieldIDfacebook').attr('readonly', false).focus().css("background-color", "#bfe1e847")



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