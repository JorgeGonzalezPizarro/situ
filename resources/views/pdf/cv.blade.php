<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Example 2</title>
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
            <div class="date">A fecha de    {{ "    " .Carbon\Carbon::today()->toDateString()}}</div>

        </div>
    </div>
    <div class="col-lg-12"><h2 style="font-size: 32px">1. Datos Personales </h2>
    <table border="0" cellspacing="2" cellpadding="4"style=" margin-left:20px; width: 500px">
        <tbody>

    <tr >
        <td><span ><strong>Nombre</strong></span>
           <td> <span style="margin-left:30px; font-style: italic; text-align: center;">{{$alumnoCv->first_name}}</span></td>
    </tr> <tr >
        <td><span ><strong>Apellido</strong></span></td>
           <td> <span style="margin-left:30px; font-style: italic">{{$alumnoCv->last_name}}</span></td>
    </tr>

    <tr >
        <td><span ><strong>Ciudad</strong></span></td>
         <td>   <span style="margin-left:30px; font-style: italic">{{$alumnoCv->first_name}}</span></td>
    </tr>
    <tr >
        <td><span ><strong>Email</strong></span></td>
            <td><span style="margin-left:30px; font-style: italic">{{$alumnoCv->email}}</span></td>
    </tr>
    <tr >
        <td><span ><strong>Telefono</strong></span></td>
           <td> <span style="margin-left:30px; font-style: italic">{{$alumnoCv->first_name}}</span></td>
    </tr>

        {{--<td class="p"><span >Apellido </span><span style=" margin-left:70px;font-style: italic">Otros datos</span></td>--}}
        {{--<li class="p"><span >Fecha Nacimiento </span><span style=" margin-left:70px;font-style: italic">Otros datos</span></li>--}}
        {{--<li class="p"><span >Email </span><span style=" margin-left:70px;font-style: italic">Otros datos</span></li>--}}
        {{--<li class="p"><span >Telefono </span><span style=" margin-left:70px;font-style: italic">Otros datos</span></li>--}}
        {{--<li class="p"><span >Ciudad</span><span style=" margin-left:70px;font-style: italic">Otros datos</span></li>--}}


        </tbody>
    </table>
    </div>
    <div class="col-lg-12"><h2 style="font-size: 32px">2.Formación </h2>
        <table border="0" cellspacing="2" cellpadding="4"style=" margin-left:20px; width: 600px">
            <tbody>
            @foreach($formacion as $for)
            <tr >
                <td><h3 >{{$for->fecha_inicio}}</h3></td>
                <td> <span style="font-style: italic; text-align: center;">{!! $for->titulacion." en ". $for->disciplina_academica . " cursado en ". $for->centro . "<br>
                                                                                                Ubicacion: ". $for->ubicacion !!}</span></td>
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
    <div class="col-lg-12"><h2 style="font-size: 32px">3.Experiencia Profesional</h2>
        <table border="0" cellspacing="2" cellpadding="4"style=" margin-left:20px; width: 600px">
            <tbody>
            @foreach($laboral as $labor)
                <tr >
                    <td><h3 >{{$labor->fecha_inicio}}</h3></td>
                    <td> <span style="font-style: italic; text-align: center;">{!! $labor->cargo." en ". $labor->empresa ."<br>" !!}

                                    @if(!empty($labor->ubicacion)){!! "Ubicado en ". $labor->ubicacion ."<br>" !!}@endif
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

    {{--<div class="col-lg-12"><h2 style="font-size: 32px">4.Otros Detalles</h2></div>--}}


</main></body>
</html>