@extends('layouts.layoutFront')
<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">


            <div class="col-lg-12">
                <h1 class="mt-4" style="padding-left: 15px"> Recuerdos   @if(Sentinel::inRole('Inv') ||Sentinel::inRole( 'Prof')) de {{$alumno->first_name }}
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


        @if(!empty($recuerdos))

            @foreach($recuerdos as $hecho)




                <!--left col-->
                    @if(count($recuerdos)>1)
                        <div class="col-md-4">
                            @else
                                <div class="col-md-12">

                                    @endif
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
        @else
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <div class="col-md-12">
                        <ul class="list-group">


                            <li class="list-group-item text-muted" style="text-align: center" contenteditable="false">No existen datos</li>


                        </ul></div></div></div>
        @endif
    </div>
    <!-- /.row -->

    </div>

    <!-- /.container -->
@endsection()