@extends('layouts.layoutFront')
<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">
<script src="/js/jquery-3.3.1.min.js"></script>

@section('content')
    <!-- Page Content -->
    <div class="container">


        <!-- Post Content Column -->
        <div class="col-lg-12">
            <h1 class="mt-4" style="padding-left: 15px"> Calificaciones  @if(Sentinel::inRole('Inv') ||Sentinel::inRole( 'Prof')) de {{$alumno->first_name }}
                <?php
                $img=json_decode($alumno->otros_datos,true)
                ?>
                @else {{$user->first_name }}
                    <?php
                    $img=json_decode($user->otros_datos,true)
                    ?>
                    <div class="col-sm-2" style="float: right;"> <a data-toggle="modal" href="" data-target="#myModal" class="iframe-btn" type="button">
                            <img  id="myimage" title="profile image" src="{!!$img['img'] !!}" class="img-circle img-responsive" name="imagen"></a>
                    </div>
                @endif </h1>
            <hr><hr>
            <hr><hr>
            <hr><hr>

        </div>
        <!-- Title -->
        @if(!empty($calificaciones))

            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="table-responsive" style="overflow-x: hidden">
                        <table id="hechos" class="mdl-data-table" cellspacing="0" width="100%">

                            <thead>
                            <tr>
                                <th style="">Nº</th>

                                <th>Grado</th>
                                <th>Calificacion </th>
                                <th>Curso-Asignatura</th>
                                <th>Profesor</th>
                                <th>Fecha</th>
                                <th>Creado</th>


                            </tr>
                            </thead>

                            <tbody id="clickable">

                            @foreach ($calificaciones as $calif)
                                <tr id="" style="cursor: pointer">
                                    <td id="id" >{{$calif->id}}</td>

                                    <td id="id">{!! $calif->calificaciones()->get()->first()->grado !!}</td>
                                    <td id="click">{{$calif->calificaciones()->get()->first()->calificacion}}</td>
                                    <td id="click">{{$calif->calificaciones()->get()->first()->curso}}</td>
                                    <td id="click">{{$calif->calificaciones()->get()->first()->profesor}}</td>
                                    <td id="click">{{$calif->fecha_inicio}}</td>
                                    <td id="click">{{$calif->created_at}}</td>

                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                    </div>

                </div>
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


<script>

    $(document).ready(function () {





        var url = "/Alumno";

        var tr = $('#clickable');
        var table = $('#hechos').DataTable({


            "scrollX": false,

            "language": {
                "lengthMenu": "Ver _MENU_ Número de registros por página",
                "zeroRecords": "No encontrado",
                "info": "Página  _PAGE_ de  _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtered from _MAX_ Total de usuarios)",
                "paginate": {
                    "first": "Primero",
                    "previous": "Anterior",
                    "next": "Siguiente",
                    "last": "Último"
                },
                "search": "Buscar &nbsp;:",

            }
        });
        $('#clickable').on('click', '#click', function () {

            var data = table
                .rows()
                .data();
            var cData = table.cell(this).data();
            var data = table.row(this).data();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


            $.ajax({
                type: "get",
                url: "{{ route('showHecho') }}",
                datatype: "json",
                encode: true,
                data: {
                    id: data[0],
                    _token: CSRF_TOKEN
                },
                success: function (response) {
                    window.location.href = "{{ url('Situ/public') }}" + "/" + response['id'] + "/"+response['categoria_id'];
                    console.log("aa+ " + response);

                },
                error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });


        });
        $('#fraseButton').on('click', function () {
            var data = $('#contenido').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: "post",
                url: "{{ route('fraseguia') }}",
                encode: true,
                data: {
                    contenido: data,
                    categoria_id: 3,
                    _token: CSRF_TOKEN

                },
                success: function (response) { // What to do if we succeed
                    window.location.href = "{{ route('alumnoDashboard') }}";

                },
                error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });


        });
    });

</script>