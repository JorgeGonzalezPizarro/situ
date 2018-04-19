@extends('layouts.layoutAdmin')
<script src="/js/jquery-3.3.1.min.js"></script>

@section('content')

    <div class="col-lg-12 col-lg-offset-0">

        <div class='col-md-12' style="    margin-top: 30px; float: left;">
            <div class="col-md-9">
                {!! Form::textarea('contenido', Input::old('contenido') , ['id'=>'contenido','placeholder'=>'Frase guía','style'=>'    margin-top: 0px; margin-bottom: 0px;width: 100%;height: 70px;']) !!}


            </div>
            <div class="col-md-3" style="margin-top: 30px">
                {!! Form::button('Guardar', array('class'=>'btn btn-info ' ,'id'=>'fraseButton' , 'style=""')) !!}</td>

            </div>
            <div class="clearfix"></div>
            <br>
            <br>
            <br>

            <div class="table-responsive" style="overflow-x: hidden">
                <table id="hechos" class="mdl-data-table" cellspacing="0" width="100%">

                    <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Fecha de creación</th>
                        <th>Contenido</th>
                        <th>Fecha del hecho</th>
                        <th>Categoria</th>
                        <th>Etiquetas</th>
                        <th>Acceso</th>

                    </tr>
                    </thead>

                    <tbody id="clickable">


                    @foreach ($hechos as $hecho)
                        <tr id="" style="cursor: pointer">
                            <td id="id">{{$hecho->id}}</td>
                            <td id="click">{{$hecho->created_at}}</td>
                            <td id="descripcion">{!!  str_limit($hecho->contenido,50,'...' )!!}</td>
                            <td id="click">{{$hecho->fecha_inicio}}</td>
                            <td id="click">{{$hecho->getCategoria()->get()->first()->categoria }}</td>

                            <td> @foreach ( $hecho->getEtiqueta()->get() as $etiq)
                                    {!! $etiq->etiqueta_id .' | '!!}
                                @endforeach</td>




                            @php ($publico = ["publico" => "publico",
                            "privado" => "privado"])
                            {{--$publico = array("publico" => "publico",--}}
                            {{--"privado" => "privado")}}--}}
                            <td id="seleccionar">
                                @php ( $checked="")
                                @foreach($publico as $public)

                                    @if($hecho->publico==$public)

                                        @php ($checked='checked')
                                    @elseif($hecho->publico==$public)

                                        @php ($checked='checked')
                                        @else
                                        @php($checked='')
                                    @endif
                                    {{$public}} {!!  Form::checkbox( $public,$public,$checked,['class'=>'checkbox'])  !!}
                                @endforeach
                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>

        <div class="col-lg-8">

            <!-- Title -->

            <!-- Author -->



            <hr>


            <div class="panel-body">

                <div class="row">
                    <ul class="list-group">


                        <li class="list-group-item text-muted"style=" text-align: center ;color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;     font-size: 18px;"  contenteditable="false">Mis frases</li>

                    </ul>                @foreach($frases as $hecho)

                    <ul class="timeline">
                        <li>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> {{$hecho->created_at}}</small></p>
                                </div>
                                <div class="timeline-body">
                                    <p style="font-size: 18px;font-family: 'Harlow Solid Italic';font-style: italic">"{{$hecho->contenido}}"<span> por {{$user-> first_name}}</span></p>



                                </div>
                            </div>
                        </li>


                    </ul>
                    @endforeach
                </div>
            </div>



        </div>


        <div class="col-lg-4">

            <!-- Title -->

            <!-- Author -->



            <hr>


            <div class="panel-body">

                <div class="row">
                    <div class="card my-4">
                        <div class="panel panel-info" style="color: white;
    background: #003865;
    margin: 0px;
    text-align: center;margin:0px padding-left: 0;
    margin-bottom: 20px;">
                            <div class="panel-body" style="padding: 10px;">
                                INVITADOS
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="list-unstyled mb-0">
                                        @foreach($invitados as $invitado)
                                            <li class="list-group-item text-right"><span class="pull-left"><strong
                                                            class="">Invitado</strong></span>
                                                <a id="popoverOption" class="btn" href="{{route('invitar')."#table"}}" data-content="Ver detalles" rel="popover" data-placement="left" data-original-title="{{$invitado->getUsuario()->get()->first()->first_name ." " .$invitado->getUsuario()->get()->first()->last_name}}">
                                                    {{$invitado->getUsuario()->get()->first()->first_name ." " .$invitado->getUsuario()->get()->first()->last_name}}</a>
                                            </li>


                            @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>


                </div>

        </div>

    </div>
        </div>
    </div>

@endsection

<script>

    $(document).ready(function () {


        $('#popoverData').popover();
        $('#popoverOption').popover({ trigger: "hover" });


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
<script>
    $(document).ready(function () {

        var table = $('#hechos').DataTable();
        var data = table
            .rows()
            .data();
        var cData = table.cell(this).data();
        var data = table.row(this).data();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


        $('.checkbox').click(function () { checkedState = $(this).attr('checked');
            $(this).parent('td').children('.checkbox:checked').each(function () {
                $(this).attr('checked', false);
            });
            var hecho=($(this).parent('td').parent('tr').find('#id').text());
            // $(this).attr('checked', checkedState);
            var mensaje = confirm("¿Confirma cambiar el nivel de acceso?");
            if (mensaje) {


                $.ajax({
                    type: "post",
                    url: "{{ route('actualizaAcceso') }}",
                    encode: true,
                    data: {
                        hecho: hecho,
                        _token: CSRF_TOKEN

                    },
                    success: function (response) {
                        window.location.reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                        window.location.reload();

                    }
                });
            }


            else {

            }
        });

        });



</script>

