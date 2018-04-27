@extends('layouts.layoutFront')
<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-12">

                <!-- Title -->
                <h1 class="mt-4">{{$hecho->titulo_hecho}}</h1>

                <!-- Author -->
                <p class="lead">
                    <a href="{{url('Situ/public')}}">{{$user-> first_name. " ". $user->last_name}} </a>
                </p>



                <hr>


                @if(!empty($hecho->ruta_imagen))
                    <img class="img-fluid rounded" style="width: 600px; height: 300px;"src="{{$hecho->ruta_imagen}}" alt="">
                @endif

                <div class="panel-body">

                    <div class="row">

                                    <div class="timeline-panel">
                                        <ul class="timeline">
                                            <li>
                                                <blockquote class="quote-card">
                                                    <p>{{$hecho->contenido}}</p>
                                                    <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> {{$hecho->created_at}}</small></p>


                                                </blockquote>

                                            </li>


                                        </ul>
                                        <div class="timeline-body">
                                @foreach(($hecho->getEtiqueta()->get()->all()) as $etiquetas)

                                    <p class="list-group-item text-left">
                                        <a href=" {{ url('Situ/public#'.$etiquetas->etiqueta_id)}}">{{$etiquetas->etiqueta_id}}</a>
                                    </p>

                                        </div>
                                    </div>


                        @endforeach
                    </div>
                </div>



            </div>

            <hr>


            <hr>
            <!-- Search Widget -->


            <!-- Side Widget -->


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
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> {{$hecho->created_at}}</small></p>
                                        </div>
                                        <div class="timeline-body">
                                            <p style="font-size: 18px;font-family: 'Harlow Solid Italic';font-style: italic">"{{$hecho->contenido}}"<span> por {{$user-> first_name}}</span></p>
                                        </div>
                                    </div>
                                </li>


                            </ul>

                    @endforeach
                </div>
                @endif

            </div>
            <!-- /.row -->

    </div>

    <!-- /.container -->
@endsection()