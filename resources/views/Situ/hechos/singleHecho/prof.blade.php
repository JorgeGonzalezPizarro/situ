@extends('layouts.layoutFront')
<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">

                @if(!empty($alumnos) && count($alumnos)>0)
                <div class="col-lg-8" id="contenedor">

                    @foreach($alumnos as $alumno)

                        <div class="col-lg-12">
                            <!-- Post Content Column -->

                            <!-- Title -->
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <span style="float: left;"> <h4 class="timeline-title">{{$alumno->first_name." "}}</h4>
                                                <h5 class="timeline-title">{{$alumno->last_name}}</h5></span>

                                        @if($user->inRole('Inv')|| $user->inRole('Prof'))   <?php $otros_datos=json_decode($alumno->otros_datos,true);?>

                                            <span style="float: right;"><img style=" width: 50px;height: 50px; float: left;"  id="myimagen" title="profile image" src="{!! $otros_datos['img'] !!}" class="img-circle img-responsive" name="imagen">
                                            @else
                                                <?php $otros_datos=json_decode($user->otros_datos,true);?>

                                                    <span style="float: right;">   <img style=" width: 50px;height: 50px; float: left;"  id="myimagen" title="profile image" src="{!! $user['img'] !!}" class="img-circle img-responsive"  name="imagen">
                                                @endif
                                                </span>
                                                    <div class="clearfix"></div>

                                            </span></div>
                                        <div class="timeline-body">
                                            <span class="pull-left"><small class="text-muted"><i class="glyphicon glyphicon-time"></i> {{$alumno->created_at}}</small></span>
                                            <br>
                                            <span class="pull-left">   {!!  $alumno->email!!}</span>
                                            <div class="clearfix"></div>
                                            <span><p><a href=" {{ url('Situ/public') }}/0/5/{{$alumno->id}}" class="btn btn-info" role="button">Ver</a>
                                    </p></span>
                                        </div>
                                    </div>
                                </li>


                            </ul>

                        </div>


                    @endforeach
            </div>
            <div class="col-lg-4">

                <div class="card my-4">
                    <h5 class="card-header">Buscar Alumnos</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" id="buscar" onkeyup="buscar()" name="buscar" class="form-control" placeholder="Nombre...">
                </span>
                        </div>
                    </div>
                </div>



            </div>
        </div></div>


    @else

            @endif

    <!-- /.container -->

@endsection

<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

<script>


    function buscar() {


        var buscar = document.getElementById("buscar");

// var x = document.getElementById("cursoSelect").selectedIndex;
        console.log($('#buscar').val());

        if(0 !=($('#buscar').val().length)) {
            $.ajax({
                type: "get",
                url: "{{url('Situ/') }}" + "/" + $('#buscar').val(),
                encode: true,
                data: {
                    input: $('#buscar').val(),

                },
                success: function (response) {

                    if (response.length == 0) {
                        var html2 = '<div class="alert alert-info" role="alert">' +
                            ' No hay hechos relacionados con  <a href="#" class="alert-link" style="font-size: 18px;"> ' + $('#buscar').val() + '</a>.' +
                            ' </div>';
                        $("#contenedor").empty();

                        $("#contenedor").append(html2);

                    }

                    else {



                        var html = [];
                        response.forEach(function (element) {

                            var otros_Datos=JSON.parse(element['otros_datos']);

                            console.log(otros_Datos['img']);
                            html.push(' <div class="col-lg-12">' +
                                '<ul class="timeline">' +
                                '<li>' +
                                '  <div class="timeline-panel">' +
                                '    <div class="timeline-heading">' +
                                '<span style="float:left;"><h4 class="timeline-title">' + element['first_name'] + '</h4>' +
                                ' <h5 class="timeline-title">' + element['last_name'] + '</h5></span>' +
                                '<span style="float: right;">  ' +
                                ' <img style=" width: 50px;height: 50px; float: left;"  id="myimagen" title="profile image" src="'+otros_Datos['img']+'" class="img-circle img-responsive"  name="imagen">'
                                +'</span> <div class="clearfix"></div></div>' +
                                '<div class="timeline-body">' +
                                '  <span class="pull-left"><small class="text-muted"><i class="glyphicon glyphicon-time"></i> ' + element['created_at'] + '</small></span>' +
                                '<br>' +

                                '   <span class="pull-left"> ' + element['email'] + '</span>' +
                                '  <div class="clearfix"></div>' +

                                ' <span><p><a href=" {{ url('Situ/public') }}/0/5/'+element['id']+'" class="btn btn-info" role="button">Ver</a>' +
                                ' </p></span>' +
                                '</div>' +
                                '</div>' +
                                '</li>' +


                                '</ul>' +

                                '</div>');

                            $("#contenedor").empty();

                            console.log(element['last_name']);

                        });
                        html.forEach(function (element) {
                            console.log(element['first_name']);

                            $("#contenedor").append(element);


                        });
                        console.log(html.length);

                    }


                },
                error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        }else{
            location.reload();
        }

    }

</script>