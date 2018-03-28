@extends('layouts.layoutFront')
<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8" id="contenedor">

           @if(!empty($hechos))
                    @foreach($hechos as $hecho)

                    <div class="col-lg-12">
                <!-- Post Content Column -->

                    <!-- Title -->
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                          <span style="float: left;">  <h4 class="timeline-title">{{$hecho->titulo_hecho}}</h4></span>
                                            <span style="float: right;">  <h4 class="timeline-title">{{$alumno->first_name}}</h4></span>
                                          <div class="clearfix"></div>  <h5 class="timeline-title">{{$hecho->getCategoria()->get()->first()->categoria}}</h5>

                                        </div>
                                        <div class="timeline-body">
                                            <span class="pull-left"><small class="text-muted"><i class="glyphicon glyphicon-time"></i> {{$hecho->created_at}}</small></span>
<br>
                                            <span class="pull-left">   {!!  str_limit($hecho->contenido,50,'...' )!!}</span>
                                            <div class="clearfix"></div>
                                            <span><p><a href=" {{ url('Situ/public') }}/{{$hecho->id}}/{{$hecho->getCategoria()->get()->first()->id}}" class="btn btn-info" role="button">Ver</a>
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
                        </select>
                        <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
                    </div>
                </div>
            </div>

            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                @foreach ($etiquetas as $etiq)
                                <li>
                                    <span style="    width: 100%;
    max-width: 100px;
    min-width: 100px;
    line-height: 40px;font-size: 14px;
    padding: 5px;" class="label label-info">   <a href="#" onclick="etiquetas(this.text)" id="etiqueta[]">{{$etiq->nombre}}</a></span>
                                </li>
                                @endforeach

                            </ul>
                        </div>

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


@endsection

<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

<script>


function etiquetas(id){



    // var x = document.getElementById("cursoSelect").selectedIndex;
    console.log(id);

    if(0 !=(id.length)) {
        $.ajax({
            type: "get",
            url: "{{url('Situ/') }}" + "/" +id,
            encode: true,
            data: {
                input: id,

            },
            success: function (response) {

                if (response.length == 0) {

                    var html2= '<div class="alert alert-info" role="alert">'+
                        ' No hay hechos relacionados con  <a href="#" class="alert-link" style="font-size: 18px;">' +id+'</a>.'+
                        ' </div>';
                    $("#contenedor").empty();

                    $("#contenedor").append(html2);

                }


                else {


                    var html = [];
                    response.forEach(function (element) {


                        html.push(' <div class="col-lg-12">' +
                            '<ul class="timeline">' +
                            '<li>' +
                            '  <div class="timeline-panel">' +
                            '    <div class="timeline-heading">' +
                            '  <span style="float: left;">  <h4 class="timeline-title">' + element['titulo_hecho'] + '</h4></span>' +
                            '<span style="float: right;">  <h4 class="timeline-title">' + element['id'] + '</h4></span>' +
                            '<div class="clearfix"></div>  <h5 class="timeline-title">' + element['categoria_id'] + '</h5>' +

                            '</div>' +
                            '<div class="timeline-body">' +
                            '  <span class="pull-left"><small class="text-muted"><i class="glyphicon glyphicon-time"></i>' + element['created_at'] + '</small></span>' +
                            '<br>' +

                            '<span class="pull-left">' + element['contenido'].substring(0, 50) + '...' + '</span>' +
                            '  <div class="clearfix"></div>' +
                            ' <span><p><a href=" {{ url('Situ/public') }}/' + element['id'] + '/' + element['categoria_id'] + '" class="btn btn-info" role="button">Ver</a>' +
                            ' </p></span>' +
                            '</div>' +
                            '</div>' +
                            '</li>' +


                            '</ul>' +

                            '</div>');

                        $("#contenedor").empty();


                    });
                    html.forEach(function (element) {
                        console.log(element['id']);

                        $("#contenedor").append(element);


                    });
                    console.log(response.length);

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

                            var html2= '<div class="alert alert-info" role="alert">'+
                                ' No hay hechos relacionados con  <a href="#" class="alert-link" style="font-size: 18px;">' +$("#buscar").val()+'</a>.'+
                                ' </div>';
                            $("#contenedor").empty();

                            $("#contenedor").append(html2);

                        }


                        else {


                            var html = [];
                            response.forEach(function (element) {


                                html.push(' <div class="col-lg-12">' +
                                    '<ul class="timeline">' +
                                    '<li>' +
                                    '  <div class="timeline-panel">' +
                                    '    <div class="timeline-heading">' +
                                    '  <span style="float: left;">  <h4 class="timeline-title">' + element['titulo_hecho'] + '</h4></span>' +
                                    '<span style="float: right;">  <h4 class="timeline-title">' + element['id'] + '</h4></span>' +
                                    '<div class="clearfix"></div>  <h5 class="timeline-title">' + element['categoria_id'] + '</h5>' +

                                    '</div>' +
                                    '<div class="timeline-body">' +
                                    '  <span class="pull-left"><small class="text-muted"><i class="glyphicon glyphicon-time"></i>' + element['created_at'] + '</small></span>' +
                                    '<br>' +

                                    '<span class="pull-left">' + element['contenido'].substring(0, 50) + '...' + '</span>' +
                                    '  <div class="clearfix"></div>' +
                                    ' <span><p><a href=" {{ url('Situ/public') }}/' + element['id'] + '/' + element['categoria_id'] + '" class="btn btn-info" role="button">Ver</a>' +
                                    ' </p></span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</li>' +


                                    '</ul>' +

                                    '</div>');

                                $("#contenedor").empty();


                            });
                            html.forEach(function (element) {
                                console.log(element['id']);

                                $("#contenedor").append(element);


                            });
                            console.log(response.length);

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