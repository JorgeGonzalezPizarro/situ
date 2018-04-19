@extends('layouts.layoutAdmin')

@section('content')
    <hr class="">

    <div class="container target">
        <div class="row">
            <div class="col-md-10">
                <h1 class="">{{ $user->first_name  }}                <img style=" width: 50px;height: 50px; float: right;"  id="myimagen" src="{!! $otros_datos['img']!!}">
                </h1>

                <br>
                <br>

            </div>


        <br>
            <div class="col-md-5">
                <div style="    color: #ffffff;
    background-color: #003865;
    border-color: #bce8f1;" class="panel-heading">EXPERIENCIA PROFESIONAL</div>
                <ul class="list-group">


                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Fecha  de registro </strong></span>{{ $user->created_at  }} </li>
                    <li class="list-group-item text-right" style="min-height: 60px;"><span class="pull-left"><strong class="">Fecha  último acceso</strong></span><span><p>{{ $user->last_login  }} </p></span></li>
                </ul>




            </div>
            <!--/col-3-->
            <div class="  col-md-5">
                <div style="    color: #ffffff;
    background-color: #003865;
    border-color: #bce8f1;" class="panel-heading">EXPERIENCIA PROFESIONAL</div>
                <ul class="list-group">



                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Nombre:</strong></span>
                        {!!  $user->first_name  !!}
                    </li>

                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Apellido:</strong></span>
                       {!!  $user->last_name  !!}
                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Email:</strong></span>
                        {!! $user->email !!}
                    </li>

                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Rol:</strong></span>

                        {{ $user->roles()->first()->slug }}
                    </li>
                </ul>

</div>
            </div>


        <div class="col-md-5">
            <!--left col-->

            <div style="    color: #ffffff;
    background-color: #003865;
    border-color: #bce8f1;" class="panel-heading">EXPERIENCIA PROFESIONAL</div>

            <ul class="list-group">
                <li class="list-group-item text-muted" style="
    color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;
">Actividad <i class="fa fa-dashboard fa-1x"></i>

                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong
                                class="">Hechos</strong></span> {!! count($hechos) !!}
                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong
                                class="">Invitados</strong></span> {!! count($invitados) !!}
                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong
                                class="">Profesores Invitados</strong></span> {!! count($profesores) !!}
                </li>

            </ul>
        </div>
            <div class="col-md-5">
                <div style="    color: #ffffff;
    background-color: #003865;
    border-color: #bce8f1;" class="panel-heading">EXPERIENCIA PROFESIONAL</div>
            <ul class="list-group">
                <li class="list-group-item text-muted"> Etiquetas <i class="fa fa-dashboard fa-1x"></i>

                </li>
                @foreach($etiquetas as $etiqueta)
                    <li class="list-group-item text-left"><span class=""><strong
                                    class="">{!!$etiqueta->nombre!!}</strong></span>
                    </li>
                @endforeach

                @foreach($etiquetasPublic as $etiquetaPubli)
                    <li class="list-group-item text-left"><span class=""><strong
                                    class="">{!!$etiquetaPubli->slug!!}</strong></span>
                    </li>
                @endforeach


            </ul>

        </div>


            </div>

    </div>


        {{--<script src="/plugins/bootstrap-pager.js"></script>--}}
    </div>

@endsection

