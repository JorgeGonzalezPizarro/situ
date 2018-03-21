@extends('layouts.layoutFront')
<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="col-lg-8">
    @foreach($hechos as $hecho)
                @foreach($hechos as $hecho)
                    <ul class="timeline">
                        <li>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">{{$hecho->titulo_hecho}}</h4>
                                    <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> {{$hecho->created_at}}</small></p>
                                </div>
                                <div class="timeline-body">
                                    <p>{{$hecho->contenido}}</p>
                                </div>
                            </div>
                        </li>


                    </ul>
                @endforeach
        @endforeach
        </div>
    </div>
    <!-- /.container -->
@endsection