@extends('layouts.layoutFront')
<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-sm-12">


                <!-- Title -->
                <h1 class="mt-4">{{$hecho->titulo_hecho}}</h1>

                <!-- Author -->
                <p class="lead">
                    <a href="{{url('Situ/public')}}">{{$user-> first_name. " ". $user->last_name}} </a>
                </p>



            </div>

            <div class="col-lg-8">

                @if(!empty($hecho->ruta_imagen))
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">Documentos <i class="fas fa-file"></i>

                                <img class="img-fluid rounded" style="width: 600px; height: 300px;"src="{{$hecho->ruta_imagen}}" alt="">

                            </div>
                        </div>
                    </div>
                @endif

                    @if(!empty($hecho->ruta_archivo))

                        @if(\File::extension($hecho->ruta_archivo)=='docx' || \File::extension($hecho->ruta_archivo) == 'doc' )
                            <div class="panel panel-info">
                                <div class="panel-heading">Documentos <i class="fas fa-file"></i>

                                    <label class="btn btn-secondary active" style="width: 100%">
                                        <a href="{!! $hecho->ruta_archivo!!}"><input  class="form-control" value="{!! $hecho->ruta_archivo !!}"> Descargar archivo </a>
                                    </label>
                                </div>
                            </div>
                        @else
                            <div class="panel panel-info">
                                <div class="panel-heading">Documentos <i class="fas fa-file"></i></div>
                                <div class="panel-body">

                                    <iframe src={{$hecho->ruta_archivo}} width="100%" height="800px"></iframe>
                                    {{--<a href="http://docs.google.com/viewer?url={{$hecho->ruta_archivo}}">aaaa</a>--}}
                                    <iframe src="http://docs.google.com/gview?url={{$hecho->ruta_archivo}}" frameborder="0" allowfullscreen></iframe>
                                </div></div>
                        @endif
                    @else


                        <div class="panel panel-info">
                            <div class="panel-heading">Documentos <i class="fas fa-file"></i>

                            </div>
                            <div class="panel-body"><span>
                                    <div class="alert alert-info"><p style="text-align: center;">No existe ningun documento vinculado</p></div></span>
                            </div>
                        </div>


            @endif

            <!--left col-->


                <div class="panel panel-info">
                    <div class="panel-heading">Otros detalles

                    </div>
                    <div class="panel-body"><span><p>{!! $hecho->contenido !!}</p></span>
                    </div>

                </div>



            </div>

        <div class="col-lg-4">

            <div class="col-md-12">
                <div class="card-body">
                    <ul class="list-group">

                        <li class="list-group-item text-muted"style="color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;" contenteditable="false">                <h5 class="card-header">Datos</h5>
                        </li>


                        <li class="list-group-item text-right"><span class="pull-left"><strong
                                        class="">Fecha  </strong></span><span><p> {{$hecho->fecha_inicio}}</p></span></li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong
                                        class="">Creado </strong></span><span><p>{{$hecho->created_at}}</p></span></li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong
                                        class="">Curso - Asignatura </strong></span><span><p>@if(!empty($hecho->curso)){{$hecho->curso}}@else {{"No vinculado"}}@endif</p></span></li>
                        {{--Fecha del hecho {{$hecho->fecha_inicio}}</input>--}}
                    </ul>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card-body">

                <ul class="list-group">

                    <li class="list-group-item text-muted"style="color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;" contenteditable="false">                <h5 class="card-header">Propósito</h5>
                    </li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong
                                        class=""> <p> {{$hecho->proposito}}</p> </strong></span></li>
                    </ul>
                </div>
            </div>
            <!-- Search Widget -->

            <div class="col-md-12">
                <ul class="list-group">

                    <li class="list-group-item text-muted"style="color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;" contenteditable="false">                <h5 class="card-header">Etiquetas</h5>
                    </li>
                    <!-- Categories Widget -->
                    @foreach(($hecho->getEtiqueta()->get()->all()) as $etiquetas)

                        <li class="list-group-item text-left">
                            <a href=" {{ url('Situ/public#'.$etiquetas->etiqueta_id)}}">{{$etiquetas->etiqueta_id}}</a>
                        </li>
                    @endforeach

                </ul>

            </div>
            <div class="col-md-12">
                <ul class="list-group">

                    <li class="list-group-item text-muted"style="color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;" contenteditable="false">                <h5 class="card-header">Evidencia</h5>
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
    </div>

        @if(!empty($otrosHechos))
<div class="row">
    <div class="col-md-12">
                <h1 class="mt-4" style="padding-left: 15px">  Relacionado con  {{$hecho->titulo_hecho}}</h1>
        <hr>
                @foreach($otrosHechos as $hecho)




                <!--left col-->
                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item text-muted" contenteditable="false">Detalles</li>
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
                                            class="">Etiquetas </strong></span><span><p>
                            @foreach(($hecho->getEtiqueta()->get()->all()) as $etiquetas)

                                    <a href="#">{{$etiquetas->etiqueta_id}}</a>
                                @endforeach
                                </p></span>
                            </li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong
                                            class=""> </strong></span>
                                <span><p><a href=" {{ url('Situ/public') }}/{{$hecho->id}}/{{$hecho->getCategoria()->get()->first()->id}}" class="btn btn-info" role="button">Ver</a>
                                    </p></span>  </li>

                        </ul>
                    </div>


                @endforeach
            </div>
</div>
        @endif

    </div>
    <!-- /.row -->

    </div>

    <!-- /.container -->
@endsection()