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
        <td><span >Nombre</span></td>
           <td> <span style="margin-left:30px; font-style: italic; text-align: center;">{{$alumnoCv->first_name}}</span></td>
    </tr> <tr >
        <td><span >Apellido</span></td>
           <td> <span style="margin-left:30px; font-style: italic">{{$alumnoCv->last_name}}</span></td>
    </tr>

    <tr >
        <td><span >Ciudad</span></td>
         <td>   <span style="margin-left:30px; font-style: italic">{{$alumnoCv->first_name}}</span></td>
    </tr>
    <tr >
        <td><span >Email</span></td>
            <td><span style="margin-left:30px; font-style: italic">{{$alumnoCv->email}}</span></td>
    </tr>
    <tr >
        <td><span >Telefono</span></td>
           <td> <span style="margin-left:30px; font-style: italic">{{$alumnoCv->first_name}}</span></td>
    </tr>

        {{--<td class="p"><span >Apellido </span><span style=" margin-left:70px;font-style: italic">Otros datos</span></td>--}}
        {{--<li class="p"><span >Fecha Nacimiento </span><span style=" margin-left:70px;font-style: italic">Otros datos</span></li>--}}
        {{--<li class="p"><span >Email </span><span style=" margin-left:70px;font-style: italic">Otros datos</span></li>--}}
        {{--<li class="p"><span >Telefono </span><span style=" margin-left:70px;font-style: italic">Otros datos</span></li>--}}
        {{--<li class="p"><span >Ciudad</span><span style=" margin-left:70px;font-style: italic">Otros datos</span></li>--}}


    </tr>
        </tbody>
    </table>
    </div>
    <div class="col-lg-12"><h2 style="font-size: 32px">2.Formación </h2>
        <table border="0" cellspacing="15" cellpadding="4"style=" margin-left:20px; width: 500px">
            <tbody>
            @foreach($formacion as $for)
            <tr >
                <td><h3 >{{$for->fecha_inicio}}</h3></td>
                <td> <span style="margin-left:30px; font-style: italic; text-align: center;">{!! $for->titulacion." en ". $for->disciplina_academica . " cursado en ". $for->centro . "</br>
                                                                                                Ubicacion: ". $for->ubicacion !!}</span></td>
            </tr>
            @endforeach


            {{--<td class="p"><span >Apellido </span><span style=" margin-left:70px;font-style: italic">Otros datos</span></td>--}}
            {{--<li class="p"><span >Fecha Nacimiento </span><span style=" margin-left:70px;font-style: italic">Otros datos</span></li>--}}
            {{--<li class="p"><span >Email </span><span style=" margin-left:70px;font-style: italic">Otros datos</span></li>--}}
            {{--<li class="p"><span >Telefono </span><span style=" margin-left:70px;font-style: italic">Otros datos</span></li>--}}
            {{--<li class="p"><span >Ciudad</span><span style=" margin-left:70px;font-style: italic">Otros datos</span></li>--}}


            </tr>
            </tbody>
        </table>

    <div class="col-lg-12"><h2 style="font-size: 32px">3.Experiencia Profesional</h2></div>

    <div class="col-lg-12"><h2 style="font-size: 32px">4.Otros Detalles</h2></div>

    <table border="0" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th class="no">#</th>
            <th class="desc">DESCRIPTION </th>
            <th class="unit">UNIT PRICE </th>
            <th class="total">TOTAL </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="no">{{ $alumnoCv->first_name  }}</td>
            <td class="desc">{{ $alumnoCv->first_name  }}</td>
            <td class="unit">{{ $alumnoCv->first_name }}</td>
            <td class="total">{{$alumnoCv->first_name  }} </td>
        </tr>

        </tbody>
        <tfoot>
        <tr>
            <td colspan="2"></td>
            <td >TOTAL</td>
            <td>$6,500.00</td>
        </tr>
        </tfoot>
    </table>
</main></body>
</html>