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
    border-color: #bce8f1;" class="panel-heading">REGISTRO Y ACCESO <i class="fas fa-sign-in-alt"></i>

                </div>
                <ul class="list-group">


                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Fecha  de registro </strong></span>{{ $user->created_at  ->formatLocalized('%d-%m-%Y')}} </li>
                    <li class="list-group-item text-right" style="min-height: 60px;"><span class="pull-left"><strong class="">Fecha  último acceso</strong></span><span><p>{{ Carbon::parse($user->last_login) ->formatLocalized('%d-%m-%Y')  }} </p></span></li>
                </ul>




            </div>
            <!--/col-3-->
            <div class="  col-md-5">
                <div style="    color: #ffffff;
    background-color: #003865;
    border-color: #bce8f1;" class="panel-heading">PERIL <i class="fas fa-user"></i>

                </div>
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

                        {{ $user->permissions[0] }}
                    </li>
                </ul>

</div>
            </div>

        @if($user->permissions[0]=='Alumno')

        <div class="col-md-5">
            <!--left col-->

            <div style="    color: #ffffff;
    background-color: #003865;
    border-color: #bce8f1;" class="panel-heading">ACTIVIDAD <i class="fas fa-info"></i></div>

            <ul class="list-group">


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
    border-color: #bce8f1;" class="panel-heading">ETIQUETAS PERSONALIZADAS<i class="fas fa-tag"></i></div>
            <ul class="list-group">

                </li>
                @if(isset($etiquetas))
                @foreach($etiquetas as $etiqueta)
                    <li class="list-group-item text-left"><span class=""><strong
                                    class="">{!!$etiqueta->nombre!!}</strong></span>
                        <a href="#" id="{{$etiqueta->id}}" onclick="eliminarEtiqueta(this.id);"><i class="far fa-trash-alt" style="color: red;"></i></a></span>

                    </li>
                @endforeach
                @endif




            </ul>
                {{--<ul class="list-group">--}}



                    {{--@foreach($etiquetasPublic as $etiquetaPubli)--}}
                        {{--@if(isset($etiquetaPubli))--}}

                            {{--<li class="list-group-item text-left"><span class=""><strong--}}
                                            {{--class="">{!!$etiquetaPubli->slug!!}</strong></span>--}}
                                {{--<a href="#" id="{{$etiquetaPubli->id}}" onclick="eliminarEtiqueta(this.id);"><i class="far fa-trash-alt" style="color: red;"></i></a></span>--}}

                            {{--</li>                @endif--}}

                    {{--@endforeach--}}


                {{--</ul>--}}
        </div>
        @endif


            </div>

    </div>


        {{--<script src="/plugins/bootstrap-pager.js"></script>--}}
    </div>

@endsection

<script>

    function eliminarEtiqueta(id) {
        $.ajax({
            type: "get",
            url: "{{ route('eliminarEtiquetaAdmin') }}",
            datatype: "json",
            encode: true,
            data: {
                id: id,
            },
            success: function (response) { // What to do if we succeed
                console.log(response);
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });





    }

</script>