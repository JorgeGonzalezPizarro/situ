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


        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #555c66;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #263238;
            color: white;
        }
    </style>
</head>
<body>

<main>
    <div id="details" class="dataTables_wrapper">
        <div id="invoice">
            <h1 style="text-align: center;font-size: 42px"> Historial   </h1>
            <div class="date" style="text-align: center"> <h3>Historial de accesos a la cuenta de {!! $usuario->first_name . " " . $usuario->last_name !!} a fecha de    {{ "    " .Carbon\Carbon::today()->toDateString()}}</h3></div>

        </div>
    </div>
    <div class="col-lg-12"><h2 style="font-size: 32px"></h2>
        <table id="customers" cellspacing="5" cellpadding="5"style=" margin-left:20px; width: 100%">
                <thead>
                <tr>
                    <th>Invitado</th>
                    <th>Rol</th>
                    <th>Acceso a </th>
                    <th>Numero de accesos</th>

                </tr>
                </thead>
            <tbody>

                @if(!empty($logAccesos))
                    {{--{{print_r($invitados)}}--}}
                    {{--{!!  $asignaturas=array(json_decode($asignaturas,true)) !!}--}}
                    @foreach ($logAccesos as $acceso)
                        <tr>
                            <td style="text-align: center;"> <span style=" font-style: italic">{{($acceso->getInvitados()->get()->first())->getUsuario()->get()->first()->first_name ." ".
                             ($acceso->getInvitados()->get()->first())->getUsuario()->get()->first()->last_name}}</span></td>
                            <td> <span style="margin-left:30px; font-style: italic">{{$acceso->getInvitados()->get()->first()->rol}}</span></td>
                            @if(!empty($acceso->hechos_id))
                               <td style="text-align: center;" > <a    style=" font-style: italic" href="{{ url('Situ/public') }}/{{($acceso->getHechos()->get()->first())->id}}/{{($acceso->getHechos()->get()->first())->getCategoria()->get()->first()->id}}" target="_blank" >Ver</a></td>
                                <td style="text-align: center;"> <span style=" font-style: italic">{{$acceso->numero_accesos}}</span></td>

                            @else
                                @if(($acceso->getInvitados()->get()->first())->rol=='Profesor')
                                    <td style="text-align: center;"> <span style=" font-style: italic">CV</span></td>

                                    @else
                                <td style="text-align: center;" > <span style="font-style: italic">Perfil</span></td>
                                @endif
                                <td style="text-align: center;"> <span style="font-style: italic">{{$acceso->numero_accesos}}</span></td>

                            @endif

                            {{--<td><span style="margin-left:30px; font-style: italic">{{$invitado->rol }}</span></td>--}}
                            {{--<td><span style="margin-left:30px; font-style: italic">{{$invitado->getUsuario()->get()->first()->created_at }}</span></td>--}}
                            {{--<td><span style="margin-left:30px; font-style: italic">{{$invitado->getUsuario()->get()->first()->last_login }}</span></td>--}}
                            {{--<td><span style="margin-left:30px; font-style: italic">{{$invitado->numero_accesos }}</span></td>--}}


                        </tr>

                    @endforeach
                @endif


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