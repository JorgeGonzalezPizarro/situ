@extends('layouts.layoutAdmin')
<script src="/js/jquery-3.3.1.min.js"></script>

@section('content')

    <div class="col-lg-10 col-lg-offset-1">

        <h1><i class="fa fa-users"></i> ALumno  Administration </h1>

        <div class="table-responsive" style="overflow-x: hidden" >
            <table id="hechos" class="mdl-data-table" cellspacing="0" width="100%">

                <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Fecha de creación</th>
                    <th>Contenido</th>
                    <th>Fecha del hecho</th>
                    <th>Categoria</th>

                </tr>
                </thead>

                <tbody id="clickable">



                @foreach ($hechos as $hecho)
                    <tr id="" style="cursor: pointer">
                        <td>{{$hecho->id}}</td>
                        <td>{{$hecho->created_at}}</td>
                        <td>{{$hecho->titulo_hecho}}</td>
                        <td>{{$hecho->fecha_inicio}}</td>
                        <td>{{$hecho->getCategoria()->first()->categoria}}</td>
                    </tr>
                @endforeach

                </tbody>

            </table>
        </div>
        <a href="/crear" class="btn btn-success">Add User</a>

    </div>

@endsection

<script>

    $(document).ready(function() {
        var url = "/Alumno";

        var tr = $('#clickable');
        var table=$('#hechos').DataTable({



            "scrollX": false,

            "language": {
                "lengthMenu": "Ver _MENU_ Número de registros por página",
                "zeroRecords": "No encontrado",
                "info": "Página  _PAGE_ de  _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtered from _MAX_ Total de usuarios)",
                "paginate": {
                    "first":      "Primero",
                    "previous":   "Anterior",
                    "next":       "Siguiente",
                    "last":       "Último"
                },
                "search":         "Buscar &nbsp;:",

            }
        });
        $('#clickable').on('click','tr', function () {

            var data = table
                .rows()
                .data();
            var cData = table.cell(this).data();
            var data = table.row( this ).data();
            //alert( 'You clicked on '+data[2]+'\'s row' );
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


            $.ajax({
                type:"get",
                url     : "{{ route('showHecho') }}",
                datatype:"json",
                encode  : true,
                data: {
                    id: data[0],
                    _token: CSRF_TOKEN
                },
                success: function(response){ // What to do if we succeed
                    window.location.href= "{{ url('Alumno/hecho') }}"+"/"+response['id'] + "/singleHecho";
                    console.log("aa+ " + response);

                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });



        } );
    } );
</script>

</script>