<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>cv {{$alumnoCv->first_name}}</title>
    {!! Html::style('asset/css/bootstrap.css') !!}
<!-- jQuery library -->
    {!! Html::style('asset/css/bootstrap-min.css') !!}


    <!-- Custom CSS -->

    <!-- Custom Fonts -->

    <!-- Chosen -->
    <style>ul{
            list-style: none;
        }
        ul li >.p{
            font-size: 16px;
            font-style: oblique;
        }
        table{
            width: 700px
        }
        table td {
            width: 100%;
        }
    </style>
</head>
<body>

<main>
    <div id="details" class="dataTables_wrapper">
        <div id="invoice">
            <h1 style="text-align: center;font-size: 42px">Curriculum Vitae </h1>
            <div class="date" style="font-style: italic;">A fecha de    {{ "    " .Carbon\Carbon::today()->formatLocalized('%d-%m-%Y')}}</div>

        </div>
    </div>
    <div class="col-lg-12"><h2 style="font-size: 32px">1. Datos Personales </h2>
    <table border="0" cellspacing="2" cellpadding="4"style=" margin-left:20px; width: 500px">
        <tbody>

    <tr >
        <td><span ><strong>Nombre</strong></span>
        <td><span ><strong></strong></span>

        <td> <span style="margin-left:30px; font-style: italic; text-align: center;">{{$alumnoCv->first_name}}</span></td>
    </tr> <tr >
        <td><span ><strong>Apellido</strong></span></td>
        <td><span ><strong></strong></span>

        <td> <span style="margin-left:30px; font-style: italic">{{$alumnoCv->last_name}}</span></td>
    </tr>
    @if(!empty($alumnoCv->dni))
    <tr >
        <td><span ><strong>DNI</strong></span></td>
        <td><span ><strong></strong></span>

        <td>   <span style="margin-left:30px; font-style: italic">{{$alumnoCv->dni}}</span></td>
    </tr>
    @endif
    @if(!empty($alumnoCv->direccion))

        <tr >
        <td><span ><strong>Direccion</strong></span></td>
            <td><span ><strong></strong></span>

            <td>   <span style="margin-left:30px; font-style: italic">{{$alumnoCv->direccion}}</span></td>
    </tr>
    @endif

    <tr >
        <td><span ><strong>Email</strong></span></td>
        <td><span ><strong></strong></span>

        <td><span style="margin-left:30px; font-style: italic">{{$alumnoCv->email}}</span></td>
    </tr>
    @if(!empty($alumnoCv->telefono))

        <tr >
        <td><span ><strong>Telefono</strong></span></td>
            <td><span ><strong></strong></span>

            <td> <span style="margin-left:30px; font-style: italic">{{$alumnoCv->telefono}}</span></td>
    </tr>
@endif
    @if(!empty($alumnoCv->otros_datos1))

        <tr >
            <td><span ><strong>Otros Datos</strong></span></td>
            <td><span ><strong></strong></span>

            <td> <span style="margin-left:30px; font-style: italic">{{$alumnoCv->otros_datos1}}</span></td>
        </tr>
    @endif
    @if(!empty($alumnoCv->otros_datos2))

        <tr >
            <td><span ><strong>Otros Datos</strong></span></td>
            <td><span ><strong></strong></span>

            <td> <span style="margin-left:30px; font-style: italic">{{$alumnoCv->otros_datos2}}</span></td>
        </tr>
    @endif
    @if(!empty($alumnoCv->otros_datos3))

        <tr >
            <td><span ><strong>Otros Datos</strong></span></td>
            <td><span ><strong></strong></span>

            <td> <span style="margin-left:30px; font-style: italic">{{$alumnoCv->otros_datos3}}</span></td>
        </tr>
    @endif


        </tbody>
    </table>
    </div>
    <div class="col-lg-12"><h2 style="font-size: 32px">2.Formación </h2>
        <table border="0" cellspacing="2" cellpadding="4"style=" margin-left:20px; width: 600px">
            <tbody>
            @foreach($formacion as $for)
            <tr >
                <td><h3 >{{ Carbon::parse($for->fecha_inicio)->formatLocalized('%d-%m-%Y')}}</h3></td>
                @if(!empty($for->fecha_fin))
                <td><h3 >{{ Carbon::parse($for->fecha_fin)->formatLocalized('%d-%m-%Y')}}</h3></td>
                @else
                    <td><h3 >Actual</h3></td>

                @endif
                <td> <span style="font-style: italic; text-align: center;">{!! $for->titulacion." en ". $for->disciplina_academica . " cursado en ". $for->centro . "<br>
                                                                                                Ubicación: ". $for->ubicacion !!}</span></td>
            </tr>
            @endforeach




            </tbody>
        </table>
    </div>
    <div class="col-lg-12"><h2 style="font-size: 32px">3.Experiencia Profesional</h2>
        <table border="0" cellspacing="2" cellpadding="4"style=" margin-left:20px; width: 600px">
            <tbody>
            @foreach($laboral as $labor)
                <tr >
                    <td><h3 >{{ Carbon::parse($labor->fecha_inicio)->formatLocalized('%d-%m-%Y')}}</h3></td>
                    @if(!empty($labor->fecha_fin))
                        <td><h3 >{{ Carbon::parse($labor->fecha_fin)->formatLocalized('%d-%m-%Y')}}</h3></td>
                    @else
                        <td><h3 >Actual</h3></td>

                    @endif                    <td> <span style="font-style: italic; text-align: center;">{!! $labor->cargo." en ". $labor->empresa ."<br>" !!}

                                    @if(!empty($labor->ubicacion)){!! "Ubicación : ". $labor->ubicacion ."<br>" !!}@endif
                                    @if(!empty($labor->sector)){!! "Sector ". $labor->sector ."<br>" !!}@endif


                        </span></td>
                </tr>
                @endforeach


                {{--<td class="p"><span >Apellido </span><span style=" margin-left:70px;font-style: italic">Otros datos</span></td>--}}
                {{--<li class="p"><span >Fecha Nacimiento </span><span style=" margin-left:70px;font-style: italic">Otros datos</span></li>--}}
                {{--<li class="p"><span >Email </span><span style=" margin-left:70px;font-style: italic">Otros datos</span></li>--}}
                {{--<li class="p"><span >Telefono </span><span style=" margin-left:70px;font-style: italic">Otros datos</span></li>--}}
                {{--<li class="p"><span >Ciudad</span><span style=" margin-left:70px;font-style: italic">Otros datos</span></li>--}}


            </tbody>
        </table>
    </div>

    <div class="col-lg-12"><h2 style="font-size: 32px">4.Hechos CV </h2>
        <table border="0" cellspacing="1" cellpadding="2"style=" margin-left:20px; width: 600px">
            <tbody>
            @foreach($hechosCv as $cv)
                <tr >
                    <td><h3 >{{ Carbon::parse($cv->fecha_inicio)->formatLocalized('%d-%m-%Y')}}</h3></td>
                    @if(!empty($cv->fecha_fin))
                        <td><h3 >{{ Carbon::parse($cv->fecha_fin)->formatLocalized('%d-%m-%Y')}}</h3></td>
                    @else
                        <td><h3 >-</h3></td>

                    @endif   <td> <span style="font-style: italic; text-align: center;">{!! $cv->categoria_nombre ." <br>  ". $cv->titulo_hecho ."<br>" !!}
                            <a  style=" font-style: italic"  href="{{ url('Situ/public') }}/{{$cv->id}}/{{$cv->categoria_id}}" target="_blank" >Ver</a>
                        </span></td>
                </tr>
            @endforeach



            </tbody>
        </table>
    </div>

    {{--<div class="col-lg-12"><h2 style="font-size: 32px">4.Otros Detalles</h2></div>--}}


</main></body>
</html>