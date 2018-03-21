@extends('layouts.layoutFront')
<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-12">
                <h1 class="mt-4" style="padding-left: 15px"> Portfolio Profesional </h1>
                <hr>
                <!-- Title -->
                @if(!empty($hechos))
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <div class="col-md-12">
                                <ul class="list-group">

                                    <li class="list-group-item text-muted" contenteditable="false">Detalles</li>
                                    <hr><hr>
                        @foreach($hechos as $hecho)





                            <!--left col-->

                                        <li class="list-group-item text-right"><span class="pull-left"><strong
                                                        class="">Sector </strong></span><span><p>{{ $hecho->getLaboral()->get()->first()->sector  }}</p></span>
                                        </li>
                                        <li class="list-group-item text-right"><span class="pull-left"><strong
                                                        class="">Empresa </strong></span><span><p>{{ $hecho->getLaboral()->get()->first()->empresa  }}</p></span>
                                        </li>
                                        <li class="list-group-item text-right"><span class="pull-left"><strong
                                                        class="">Cargo </strong></span><span><p>{{ $hecho->getLaboral()->get()->first()->cargo  }}</p></span>
                                        </li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong
                                                class="">Ubicacion </strong></span><span><p>{{ $hecho->getLaboral()->get()->first()->ubicacion  }}</p></span>
                                </li>
                                        <li class="list-group-item text-right"><span class="pull-left"><strong
                                                        class="">Etiquetas </strong></span><span><p>
                            @foreach(($hecho->getEtiqueta()->get()->all()) as $etiquetas)

                                                        <a href="#">{{$etiquetas->etiqueta_id}}</a>
                                                    @endforeach
                                </p></span>
                                        </li>
                                        {{--<li class="list-group-item text-right"><span class="pull-left"><strong--}}
                                                        {{--class=""> </strong></span>--}}
                                            {{--<span><p><a href=" {{ url('Situ/public') }}/{{$hecho->id}}/{{$hecho->getCategoria()->get()->first()->id}}" class="btn btn-info" role="button">Ver</a>--}}
                                    {{--</p></span>  </li>--}}
                                        {{--<li class="list-group-item text-right"><span class="pull-left"><strong--}}
                                        {{--class="">Asignatura </strong></span><span><p>{{ $hecho->calificaciones()->first()->asignatura  }}</p></span>--}}
                                        {{--</li>--}}
                                        {{--<li class="list-group-item text-right"><span class="pull-left"><strong--}}
                                        {{--class="">Calificacion  </strong></span>{{ $hecho->calificaciones()->get()->first()->calificacion }} </li>--}}
                                        {{--<li class="list-group-item text-right"><span class="pull-left"><strong--}}
                                        {{--class="">Profesor </strong></span><span><p>{{ $hecho->calificaciones()->first()->profesor  }}</p></span>--}}
                                        {{--</li>--}}

<hr><hr>
                            @endforeach

                                </ul>
                            </div>

                        </div>
                    </div>
                @endif




        </div>
        <!-- /.row -->

    </div>
    </div>
    <!-- /.container -->
@endsection()