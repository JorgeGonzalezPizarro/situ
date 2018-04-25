@extends('layouts.layoutAdmin')
<script src="/js/jquery-3.3.1.min.js"></script>

@section('content')

    <div class="col-lg-10 col-lg-offset-1">

        <h1><i class="fa fa-users"></i> Hola   @if(Sentinel::check()) {{   Sentinel::getUser()->first_name }} @endif   </h1>

        <div class="table-responsive" style="overflow-x: hidden" >
            <table id="usuarios" class="mdl-data-table" cellspacing="0" width="100%">

                <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Fecha Límite</th>

                </tr>
                </thead>

                <tbody id="clickable">



                    @foreach ($users as $user)
                        <tr id="" style="cursor: pointer">
                            <td id="user">{{$user->first_name}}</td>
                            <td id="user">{{$user->last_name}}</td>
                            <td id="user" >{{$user->email}}</td>
                            <td id="user" >{{$user->roles()->first()->slug }}</td>

                            @if(($user->roles()->first()->slug=='Prof')|| ($user->roles()->first()->slug=='Inv'))
                                <td id="prof">
                           <span id="{{ $user->invitado()->get()->first()->fecha_limite}}" class="prof">{{

                            \Carbon\Carbon::parse($user->invitado()->get()->first()->fecha_limite)->format('d/m/Y')
                            }}</span>

                             <br>  <a href="#myModal2" data-toggle="modal" id="{{$user->invitado()->get()->first()->id }}" data-target="#myModal2">Cambiar Fecha </a></td>

                                @else
                                <td>  {{"Indefinido"}}</td>
                                @endif
                        </tr>
                    @endforeach

                </tbody>

            </table>
        </div>


    </div>
    <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker2'>
                            <input name="fechaActualizar" id="fechaActualizar" type='text' class="form-control" />
                            <span class="input-group-addon">

                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                        <div class='input-group date' id='datetimepicker2'>
                            <button type="submit" id="botonActualizarFecha">Confirmar</button>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
@endsection
<script>
    $(document).ready(function() {
        var myNodelist  =   document.getElementsByClassName("prof");

        var date= new Date();
        var array = $.map(myNodelist, function(value, index) {
            return [value];
        });


        var fechas;
        array.forEach(function (element){
                if((element.id ) <  new Date().toISOString().slice(0,10)){
                    element.style.color="red";
                }else {
                    element.style.color="green";


                }

        });
        console.log(  array);// Finds the closest row <tr>
    // Gets a descendent with class="nr"



        var url = "/Admin";
        var tr = $('#clickable');
        var table=$('#usuarios').DataTable({
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
            }


        );

        $('#myModal2').on('shown.bs.modal',function (e) {
            var id= e.relatedTarget.id;
            $("#botonActualizarFecha").on('click',function () {
                var fecha=document.getElementById("fechaActualizar");
                var fechaActualizar=fecha.value;
                var mensaje = confirm("¿Confirma cambiar la fecha");
                if (mensaje) {


                    $.ajax({
                        type: "get",
                        url: "{{ route('actualizarFechaAdmin') }}",
                        data: {
                            fecha: fechaActualizar,
                            id : id,
                        },
                        success: function (response) {
                            // console.log(response);

                            var element = document.createElement('a');
                            element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(response));
                            element.setAttribute('download', 'Fecha_actualizada_invitado.txt');

                            element.style.display = 'none';
                            document.body.appendChild(element);

                            element.click();

                            document.body.removeChild(element);
                            window.location.reload();                        },
                        error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                            console.log(jqXHR);

                        }
                    });
                }


                else {

                }
            })


        });
        $("#datetimepicker2").datepicker({

            onSelect: function(date) {
                document.getElementById("endDate").disabled = false;



            }

        });



    function getFormattedDate(date) {
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear().toString().slice(2);
        return day + '-' + month + '-' + year;


    }



        $('#clickable').on('click','tr td#user', function () {

            var data = table
                .rows()
                .data();
            var cData = table.cell(this).data();
            var data = table.row( this ).data();
            //alert( 'You clicked on '+data[2]+'\'s row' );
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


            $.ajax({
                   type:"get",
                url     : "{{ route('actualizarUsuario') }}",
                datatype:"json",
                encode  : true,
                  // url: url + '/' + 'actualizarUsuario'+ '/',
                   data: {
                       email: data[2],
                       _token: CSRF_TOKEN
                   },
                success: function(response){ // What to do if we succeed
                  window.location.href= "{{ url('Admin/usuario') }}"+"/"+response;
                    console.log(response);
                    {{--$(location).attr('href', "{{route('Admin/actualizar')}}"+"/"+ data[2]+"");--}}

                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });



        } );
    } );





</script>
    <!-- Scripts -->
