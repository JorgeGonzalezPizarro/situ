@extends('layouts.layoutFront')
<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8" id="contenedor">

                @if(!empty($alumnos))
                    @foreach($alumnos as $alumno)

                        <div class="col-lg-12">
                            <!-- Post Content Column -->

                            <!-- Title -->
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">{{$alumno->first_name}}</h4>
                                            <h5 class="timeline-title">{{$alumno->last_name}}</h5>

                                        </div>
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
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" id="buscar" onkeyup="buscar()" name="buscar" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
                        </div>
                    </div>
                </div>

                @endif

                <div class="card my-4">
                    <h5 class="card-header">Side Widget</h5>
                    <div class="card-body">
                        You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                    </div>
                </div>
            </div>
        </div>
    </div>
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

                        $('#buscar1').hide();

                    }

                    else {



                        var html = [];
                        response.forEach(function (element) {


                            html.push(' <div class="col-lg-12">' +
                                '<ul class="timeline">' +
                                '<li>' +
                                '  <div class="timeline-panel">' +
                                '    <div class="timeline-heading">' +
                                '<h4 class="timeline-title">' + element['first_name'] + '</h4>' +
                                ' <h4 class="timeline-title">' + element['last_name'] + '</h4>' +

                                '                                            <div class="clearfix"></div></div>' +
                                '<div class="timeline-body">' +
                                '  <span class="pull-left"><small class="text-muted"><i class="glyphicon glyphicon-time"></i>' + element['created_at'] + '</small></span>' +
                                '<br>' +

                                '   <span class="pull-left"> ' + element['email'] + '</span>' +
                                '  <div class="clearfix"></div>' +

                                ' <span><p><a href=" {{ url('Situ/public') }}/' + element['id'] + '/' + element['categoria_id'] + '" class="btn btn-info" role="button">Ver</a>' +
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