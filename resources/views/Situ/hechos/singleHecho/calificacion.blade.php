@extends('layouts.layoutFront')
<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <h1 class="mt-4">{{$hecho->titulo_hecho}}</h1>

            <!-- Author -->
            <p class="lead">
                <a href="">{{$user-> first_name. " ". $user->last_name}} </a>
            </p>
            <!-- Post Content Column -->
                    <div class="col-lg-8">

                        <!-- Title -->





                        @if(!empty($hecho->ruta_imagen))
                        <img class="img-fluid rounded" style="width: 600px; height: 300px;"src="{{$hecho->ruta_imagen}}" alt="">
                        @endif
                        <div class="col-sm-12">
                            <!--left col-->
                            <ul class="list-group">

                                <li style="color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;"class="list-group-item text-muted" contenteditable="false">                <h5 class="card-header">Detalles de la calificacion</h5>
                                    </li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong
                                                class="">Curso - Asignatura </strong></span><span><p>{{ $hecho->calificaciones()->get()->first()->curso  }}</p></span>
                                </li>

                                <li class="list-group-item text-right"><span class="pull-left"><strong
                                                class="">Calificacion  </strong></span>{{ $hecho->calificaciones()->get()->first()->calificacion }} </li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong
                                                class="">Profesor </strong></span><span><p>{{ $hecho->calificaciones()->first()->profesor  }}</p></span>
                                </li>

                            </ul>
                            <div class="panel panel-info">
                                <div class="panel-heading">Otros detalles

                                </div>
                                <div class="panel-body"><span><p>{!! $hecho->contenido !!}</p></span>
                                </div>

                            </div>

                        </div>



            </div>

            <div class="col-md-4">
                <div class="card-body">
                            <ul class="list-group">


                                <li class="list-group-item text-right"><span class="pull-left"><strong
                                                class="">Fecha  </strong></span><span><p> {{$hecho->fecha_inicio}}</p></span></li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong
                                                class="">Creado </strong></span><span><p>{{$hecho->created_at}}</p></span></li>
                            {{--Fecha del hecho {{$hecho->fecha_inicio}}</input>--}}
                            </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-body">
                    <ul class="list-group">


                        <li class="list-group-item text-right"><span class="pull-left"><strong
                                        class="">Proposito  </strong></span><span><p> {{$hecho->proposito}}</p></span></li>
                    </ul>
                </div>
            </div>
                <hr>
                <!-- Search Widget -->

            <div class="col-md-4">
                <ul class="list-group">

                <li style="color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;"class="list-group-item text-muted" contenteditable="false">                <h5 class="card-header">Etiquetas</h5>
                </li>
                                    <!-- Categories Widget -->
                @foreach(($hecho->getEtiqueta()->get()->all()) as $etiquetas)

                                        <li class="list-group-item text-left">
                                                    <a href=" {{ url('Situ/public#'.$etiquetas->etiqueta_id)}}">{{$etiquetas->etiqueta_id}}</a>
                                       </li>
                                    @endforeach

                                </ul>

                </div>
                <!-- Side Widget -->
                    <div class="col-md-4">
                <ul class="list-group">


                    <li class="list-group-item text-left">

                        <h5 class="card-header">Evidencia</h5>
                    </li>
                    <li class="list-group-item text-left" style="height: auto !important;">
                        <p>
                            @if(!empty($hecho->evidencia))

                                <img class="img-fluid rounded" style="width: 330px; height: 240px;"src="{{$hecho->evidencia}}" alt="">
                            @endif
                        </p>
                    </li>
                </ul>

            </div>

            </div>

            @if(!empty($otrosHechos))
                <!-- Post Content Column -->
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="mt-4" style="padding-left: 15px">  Relacionado con  {{$hecho->titulo_hecho}}</h1>
                            <hr>
                    @foreach($otrosHechos as $hecho)

                        @if(!empty($hecho->ruta_imagen))
                            <img class="img-fluid rounded" style="width: 600px; height: 300px;"src="{{$hecho->ruta_imagen}}" alt="">

                            @endif


                            <!--left col-->
                            <div class="col-md-4">
                                <ul class="list-group">

                                    <li style="color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;" class="list-group-item text-muted" contenteditable="false">Detalles</li>
                                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                                    class="">{{$hecho->getCategoria()->get()->first()->categoria}} </strong></span><span><p>{{ $hecho->titulo_hecho  }}</p></span>
                                    </li>
                                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                                    class="">Fecha publicación </strong></span><span><p>{{$hecho->created_at}}</p></span>
                                    </li>
                                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                                    class="">Fecha del {{$hecho->getCategoria()->get()->first()->categoria}}  </strong></span><span><p>{{$hecho->fecha_inicio}}</p></span>
                                    </li>
                                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                                    class="">Contenido </strong></span><span><p>{!!  str_limit($hecho->contenido,50,'...' )!!}</p></span>
                                    </li>
                                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                                    class=""> </strong></span>
                                        <span><p><a href=" {{ url('Situ/public') }}/{{$hecho->id}}/{{$hecho->getCategoria()->get()->first()->id}}" class="btn btn-info" role="button">Ver</a>
                                    </p></span>  </li>


                                </ul>
                            </div>


                @endforeach
                    </div>
                @endif

        </div>
        <!-- /.row -->

    </div>

    <!-- /.container -->
@endsection()