@extends('layouts.layoutFront')
<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">

@section('content')
    <!-- Page Content -->
    <div class="container">


            <!-- Post Content Column -->
            <div class="col-lg-12">
                <h1 class="mt-4" style="padding-left: 15px"> Portfolio Profesional @if(Sentinel::inRole('Inv') ||Sentinel::inRole( 'Prof')) de {{$alumno->first_name }}
                    <?php
                    $img=json_decode($alumno->otros_datos,true)
                    ?>
                                                                                       @else {{$user->first_name }}
                                                                                       <?php
                                                                                       $img=json_decode($user->otros_datos,true)
                         ?>
                       {{--<div class="col-sm-2" style="float: right;"> <a data-toggle="modal" href="" data-target="#myModal" class="iframe-btn" type="button">--}}
                               {{--<img  id="myimage" title="profile image" src="{!!$img['img'] !!}" class="img-circle img-responsive" name="imagen"></a>--}}
                        {{--</div>--}}
                    @endif </h1>
                <hr><hr>
            </div>
                <!-- Title -->
                @if(!empty($hechos) && count($hechos)>0)
                        <div class="col-md-8">
                            <div class="col-md-12">
                                <ul class="list-group">


                        @foreach($hechos as $hecho)

                            <!--left col-->
                        @if(!is_null($hecho->laboral_id))
                                    <li class="list-group-item text-muted"><h2 class="">Experiencia Profesional </h2>
                                    </li>

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
                                                    class="">Fecha Inicio</strong></span><span><p>{{ $hecho->getLaboral()->get()->first()->fecha_inicio  }}</p></span>
                                    </li>
                                    @if( $hecho->getLaboral()->get()->first()->actual=='0')
                                        <li class="list-group-item text-right"><span class="pull-left"><strong
                                                        class="">Fecha Fin  </strong></span><span><p>{{ $hecho->getLaboral()->get()->first()->fecha_fin  }}</p></span>
                                        </li>

                                    @else
                                        <li class="list-group-item text-right"><span class="pull-left"><strong
                                                        class="">Fecha Fin</strong></span><span><p>Actualidad</p></span>
                                        </li>
                                    @endif
                                @elseif(!is_null($hecho->formacion_id))
                                    <li class="list-group-item text-muted"><h2 class="">Formacion Academica </h2>
                                    </li>
                                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                                    class="">Centro </strong></span><span><p>{{ $hecho->getFormacion()->get()->first()->centro  }}</p></span>
                                    </li>
                                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                                    class="">Ubicacion </strong></span><span><p>{{ $hecho->getFormacion()->get()->first()->ubicacion  }}</p></span>
                                    </li>
                                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                                    class="">Titulacion </strong></span><span><p>{{ $hecho->getFormacion()->get()->first()->titulacion  }}</p></span>
                                    </li>
                                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                                    class="">Disciplina Academica </strong></span><span><p>{{ $hecho->getFormacion()->get()->first()->disciplina_academica  }}</p></span>
                                    </li>
                                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                                    class="">Fecha Inicio</strong></span><span><p>{{ $hecho->getFormacion()->get()->first()->fecha_inicio  }}</p></span>
                                    </li>
                                @if( $hecho->getFormacion()->get()->first()->actual=='0')
                                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                                    class="">Fecha Fin  </strong></span><span><p>{{ $hecho->getFormacion()->get()->first()->fecha_fin  }}</p></span>
                                    </li>

                                    @else
                                        <li class="list-group-item text-right"><span class="pull-left"><strong
                                                        class="">Fecha Fin</strong></span><span><p>Actualidad</p></span>
                                        </li>
                                    @endif

                                        <li class="list-group-item text-right"><span class="pull-left"><strong
                                                        class="">Etiquetas </strong></span><span><p>



                            @foreach(($hecho->getEtiqueta()->get()->all()) as $etiquetas)

                                                        <a href="#">{{$etiquetas->etiqueta_id}}</a>
                                                    @endforeach
                                </p></span>
                                        </li>

                            @else
                                    <div class="col-md-10">
                                        <hr>
                                        <ul class="list-group">


                                            <li class="list-group-item text-muted" style="text-align: center" contenteditable="false">No existen datos</li>


                                        </ul></div>
                                @endif


                            @endforeach

                                </ul>
                            </div>

                        </div>
            <div class="col-md-4">
                <div class="col-md-12">
                    <ul class="list-group">

                        <li class="list-group-item text-muted" contenteditable="false">Otros datos</li>

                        <li class="list-group-item text-right"><span class="pull-left">
                                        <i class="fa fa-linkedin fa-2x"></i></span>

                            <span><p>   <a href="http://{!!  $img['linkedin']!!}"> Perfil en Linkedin</a></p></span></li>

                        <li class="list-group-item text-right"><span class="pull-left">  <strong>Generar CV</strong>
                                    </span> <span><p><a target="_blank" href="{{url('Situ/public/0/5/0/cv')}}"><button type="button" class="btn btn-raised btn-secondary">CV</button></a></p></span></li>

                    </ul>
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

        <!-- /.row -->

    </div>

    <!-- /.container -->
@endsection()