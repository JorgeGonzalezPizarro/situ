@extends('layouts.layoutFront')
<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

            @foreach($hechos as $hecho)

                    <div class="col-lg-8">
                <!-- Post Content Column -->

                    <!-- Title -->
                    <h1 class="mt-4">{{$hecho->titulo_hecho}}</h1>

                    <!-- Author -->
                    <p class="lead">
                        by
                        <a href="#">Start Bootstrap</a>
                    </p>

                    <hr>

                    <!-- Date/Time -->
                    <p>{{$hecho->fecha_inicio}}</p>

                    <hr>

                    <!-- Preview Image -->

                    <hr>

                    <!-- Post Content -->
                    {!! $hecho->contenido !!}

                    </div>


        @endforeach
            </div>
            <div class="col-lg-4">

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