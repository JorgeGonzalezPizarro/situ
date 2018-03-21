@extends('layouts.layoutFront')
<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

            @foreach($hechos as $hecho)

                    <div class="col-lg-12">
                <!-- Post Content Column -->

                    <!-- Title -->
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                             <h4 class="timeline-title">{{$hecho->titulo_hecho}}</h4>
                                           <h5 class="timeline-title">{{$hecho->getCategoria()->get()->first()->categoria}}</h5>

                                        </div>
                                        <div class="timeline-body">
                                            <span class="pull-left"><small class="text-muted"><i class="glyphicon glyphicon-time"></i> {{$hecho->created_at}}</small></span>
<br>
                                            <span class="pull-left">   {!!  str_limit($hecho->contenido,50,'...' )!!}</span>
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