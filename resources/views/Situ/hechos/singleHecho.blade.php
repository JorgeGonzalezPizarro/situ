@extends('layouts.layoutFront')
<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">

@section('content')
    <!-- Page Content -->
    <div class="container">
        @foreach($hechos as $hecho)
            <div class="row">

                <!-- Post Content Column -->
                <div class="col-lg-8">

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


            </div>
        @endforeach
    </div>
    <!-- /.container -->
@endsection