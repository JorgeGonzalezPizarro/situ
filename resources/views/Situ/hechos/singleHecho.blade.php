@extends('layouts.layoutFront')
<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

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
                        <select  id="buscar1"  name="buscar">
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
                                <li>
                                    <a href="#">{{$hecho->id}}</a>
                                </li>
                                <li>
                                    <a href="#">HTML</a>
                                </li>
                                <li>
                                    <a href="#">Freebies</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">JavaScript</a>
                                </li>
                                <li>
                                    <a href="#">CSS</a>
                                </li>
                                <li>
                                    <a href="#">Tutorials</a>
                                </li>
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



       function buscar() {


           var buscar = document.getElementById("buscar");

           // var x = document.getElementById("cursoSelect").selectedIndex;
           console.log($('#buscar').val());

           $( '#buscar1').empty();

           $.ajax({
               type: "get",
               url: "{{url('Situ/') }}" +"/"+ $('#buscar').val(),
               encode: true,
               data: {
                   input: $('#buscar').val(),

               },
               success: function (response) {

                   if (response.length == 0) {

                       $( '#buscar1').hide();

                   }

                   else {

                       $('#buscar1')
                           .append($("<option></option>")
                               .attr("value", response)
                               .text(response));
                       $( '#buscar1').show();

                       response.forEach(function (element) {
                        console.log(response);
                           // $('#buscar1')
                           //     .append($("<option></option>")
                           //         .attr("value", response)
                           //         .text(response));
                       });
                   }


               },
               error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                   console.log(JSON.stringify(jqXHR));
                   console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
               }
           });


       }

    </script>