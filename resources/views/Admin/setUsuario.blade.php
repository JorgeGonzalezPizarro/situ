@extends('layouts.layoutAdmin')

@section('content')
    <hr class="">

    <div class="container target">
        <div class="row">
            <div class="col-sm-10">
                <h1 class="">{{ $user->first_name  }}                <img style=" width: 50px;height: 50px; float: right;"  id="myimagen" src="{!! $otros_datos['img']!!}">
                </h1>

                <br>
                <br>

            </div>


        <br>
            <div class="col-sm-3">
                <!--left col-->
                <ul class="list-group">
                    <li class="list-group-item text-muted" contenteditable="false">Perfil</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Fecha  de registro </strong></span>{{ $user->created_at  }} </li>
                    <li class="list-group-item text-right" style="min-height: 60px;"><span class="pull-left"><strong class="">Fecha  último acceso</strong></span><span><p>{{ $user->last_login  }} </p></span></li>
                </ul>




            </div>
            <!--/col-3-->
            <div class="  col-md-6">

            <div class="panel panel-info">

                <div class="panel-body">



                            <table class="table table-user-information">
                                <div class="input-append">
                                    {{--<input id="fieldID4" type="text" name="imagen" style="display: none;">--}}

                                </div>
                                <tbody>
                                <tr>
                                    <td><strong class="">Nombre:</strong></td>
                                    <td>{!!  $user->first_name  !!}

                                    </td>
                                </tr>
                                <tr>
                                    <td><strong class="">Apellido:</strong></td>
                                    <td>{!!  $user->last_name  !!}

                                    </td>
                                </tr>
                                <tr>
                                    <td><strong class="">Email:</strong></td>
                                    <td> {!! $user->email !!}

                                    </td>
                                </tr>
                                    <tr>
                                    <td><strong class="">Rol:</strong></td>

                                    <td>{{ $user->roles()->first()->slug }}
                                    </td>
                                </tr>


                                </tbody>

                            </table>



                        </div>
                </div>
            </div>


        <div class="col-md-3">
            <!--left col-->



            <ul class="list-group">
                <li class="list-group-item text-muted">Actividad <i class="fa fa-dashboard fa-1x"></i>

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
        <div id="push"></div>
        </div>

    </div>




        {{--<script src="/plugins/bootstrap-pager.js"></script>--}}
    </div>

@endsection

