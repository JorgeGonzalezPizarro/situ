@extends('layouts.layoutFront')
<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

                    <!-- Post Content Column -->
                    <div class="col-lg-8">

                        <!-- Title -->
                        <h1 class="mt-4">{{$hecho->titulo_hecho}}</h1>

                        <!-- Author -->
                        <p class="lead">
                            de
                            <a href="">{{$user-> first_name. " ". $user->last_name}} </a>
                        </p>


                        <!-- Date/Time -->


                        <!-- Preview Image -->

                        <hr>

                        <!-- Post Content -->
                        {!! $hecho->contenido !!}



                        @if(!empty($hecho->ruta_imagen))
                        <img class="img-fluid rounded" style="width: 600px; height: 300px;"src="{{$hecho->ruta_imagen}}" alt="">
                        @endif
                        <div class="col-sm-12">
                            <!--left col-->
                            <ul class="list-group">

                                <li class="list-group-item text-muted" contenteditable="false">Detalles de la calificacion</li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong
                                                class="">Curso </strong></span><span><p>{{ $hecho->calificaciones()->get()->first()->curso  }}</p></span>
                                </li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong
                                                class="">Asignatura </strong></span><span><p>{{ $hecho->calificaciones()->first()->asignatura  }}</p></span>
                                </li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong
                                                class="">Calificacion  </strong></span>{{ $hecho->calificaciones()->get()->first()->calificacion }} </li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong
                                                class="">Profesor </strong></span><span><p>{{ $hecho->calificaciones()->first()->profesor  }}</p></span>
                                </li>

                            </ul>
                            <div class="panel panel-default">
                                <div class="panel-heading">Otros detalles

                                </div>
                                <div class="panel-body">{{ $hecho->contenido}}.

                                </div>
                            </div>

                        </div>



            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">
                <p>Fecha del hecho {{$hecho->fecha_inicio}}</p>
                <p>Fecha de creacion {{$hecho->fecha_inicio}}</p>

                <hr>
                <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
                        </div>
                    </div>
                </div>

                <!-- Categories Widget -->
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
                            <div class="col-lg-6">
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

                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Side Widget</h5>
                    <div class="card-body">
                        You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                    </div>
                </div>

            </div>


                <!-- Post Content Column -->
                    <div class="col-lg-12">
                        <h1 class="mt-4">  Otras calificaciones</h1>
                    @foreach($hechos as $hecho)
                        <!-- Title -->

                        <!-- Author -->

                        {!! $hecho->contenido !!}



                        @if(!empty($hecho->ruta_imagen))
                            <img class="img-fluid rounded" style="width: 600px; height: 300px;"src="{{$hecho->ruta_imagen}}" alt="">
                        @endif
                            <!--left col-->
                            <div class="col-md-4">
                            <ul class="list-group">

                                <li class="list-group-item text-muted" contenteditable="false">Detalles de la calificacion</li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong
                                                class="">Curso </strong></span><span><p>{{ $hecho->calificaciones()->get()->first()->curso  }}</p></span>
                                </li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong
                                                class="">Asignatura </strong></span><span><p>{{ $hecho->calificaciones()->first()->asignatura  }}</p></span>
                                </li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong
                                                class="">Calificacion  </strong></span>{{ $hecho->calificaciones()->get()->first()->calificacion }} </li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong
                                                class="">Profesor </strong></span><span><p>{{ $hecho->calificaciones()->first()->profesor  }}</p></span>
                                </li>

                            </ul>
                            </div>


            @endforeach
                    </div>

        </div>
        <!-- /.row -->

    </div>

    <!-- /.container -->
@endsection()