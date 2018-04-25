@extends('layouts.layoutFront')
<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">


            <div class="col-lg-12">
                <h1 class="" style="padding-left: 15px">  Proyectos de Investigación   @if(Sentinel::inRole('Inv') ||Sentinel::inRole( 'Prof')) de {{$alumno->first_name }}
                    {{--<?php--}}
                    {{--$img=json_decode($alumno->otros_datos,true)--}}
                    {{--?>--}}
                    {{--@else--}}
                        {{--<?php--}}
                        {{--$img=json_decode($user->otros_datos,true)--}}
                        {{--?>--}}
                        {{--<div class="col-sm-2" style="float: right;"> <a data-toggle="modal" href="" data-target="#myModal" class="iframe-btn" type="button">--}}
                                {{--<img  id="myimage" title="profile image" src="{!!$img['img'] !!}" class="img-circle img-responsive" name="imagen"></a>--}}
                        {{--</div>--}}
                    @endif </h1>
                <hr><hr>


            </div>


        @if(!empty($proyectos))

            @foreach($proyectos as $hecho)




                <!--left col-->
                    @if(count($proyectos)>1)
                        <div class="col-md-4">
                            @else
                                <div class="col-md-12">

                                    @endif
                                    <ul class="list-group">

                                        <li class="list-group-item text-muted" style="color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;"contenteditable="false">Detalles</li>
                                        <li class="list-group-item text-right"><span class="pull-left"><strong
                                                        class="">{{$hecho->getCategoria()->get()->first()->categoria}} </strong></span><span><p>{{ $hecho->titulo_hecho  }}</p></span>
                                        </li>


                                        <li class="list-group-item text-right"><span class="pull-left"><strong
                                                        class="">Fecha publicación </strong></span><span><p><?php setlocale(LC_TIME, 'Spanish') ?>{{ $hecho->created_at->formatLocalized('%d-%m-%Y')}}</p></span>
                                        </li>
                                        <li class="list-group-item text-right"><span class="pull-left"><strong
                                                        class="">Fecha del {{$hecho->getCategoria()->get()->first()->categoria}}  </strong></span><span><p> {!! Carbon\Carbon::parse($hecho->fecha_inicio)->format('d-m-Y ')   !!}</p></span>
                                        </li>

                                        <li class="list-group-item text-right"><span class="pull-left"><strong
                                                        class="">Etiquetas </strong></span><span><p>
                            @foreach(($hecho->getEtiqueta()->get()->all()) as $etiquetas)

                                                        <a href=" {{ url('Situ/public#'.$etiquetas->etiqueta_id)}}">{{$etiquetas->etiqueta_id}}</a>
                                                    @endforeach
                                </p></span>
                                        </li>
                                        <li class="list-group-item text-right"><span class="pull-left"><strong
                                                        class=""> </strong></span>
                                            <span><p><a href=" {{ url('Situ/public') }}/{{$hecho->id}}/{{$hecho->getCategoria()->get()->first()->id}}" class="btn btn-info" role="button">Ver</a>
                                    </p></span>  </li>
                                        {{--<li class="list-group-item text-right"><span class="pull-left"><strong--}}
                                        {{--class="">Asignatura </strong></span><span><p>{{ $hecho->calificaciones()->first()->asignatura  }}</p></span>--}}
                                        {{--</li>--}}
                                        {{--<li class="list-group-item text-right"><span class="pull-left"><strong--}}
                                        {{--class="">Calificacion  </strong></span>{{ $hecho->calificaciones()->get()->first()->calificacion }} </li>--}}
                                        {{--<li class="list-group-item text-right"><span class="pull-left"><strong--}}
                                        {{--class="">Profesor </strong></span><span><p>{{ $hecho->calificaciones()->first()->profesor  }}</p></span>--}}
                                        {{--</li>--}}

                                    </ul>
                                </div>


                                @endforeach
                        </div>
        </div>
        @else
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <div class="col-md-12">
                        <ul class="list-group">


                            <li class="list-group-item text-muted"style=" text-align: center ;color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;"  contenteditable="false">No existen datos</li>


                        </ul></div></div></div>
        @endif
    </div>
    <!-- /.row -->

    </div>

    <!-- /.container -->
@endsection()