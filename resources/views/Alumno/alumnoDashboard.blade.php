@extends('layouts.layoutAdmin')

@section('content')

    <div class="col-lg-10 col-lg-offset-1">

        <h1><i class="fa fa-users"></i> ALumno  Administration </h1>

        <div class="table-responsive" style="overflow-x: hidden" >
            <table id="usuarios" class="mdl-data-table" cellspacing="0" width="100%">

                <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Fecha Hecho</th>
                    <th>Contenido</th>
                </tr>
                </thead>

                <tbody id="clickable">



                @foreach ($hechos as $hecho)
                    <tr id="" style="cursor: pointer">
                        <td>{{$hecho->titulo_hecho}}</td>
                        <td>{{$hecho->fecha_hecho}}</td>
                        <td>{{$hecho->contenido}}</td>

                    </tr>
                @endforeach

                </tbody>

            </table>
        </div>
        <a href="/crear" class="btn btn-success">Add User</a>

    </div>

@endsection