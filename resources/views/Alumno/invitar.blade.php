@extends('layouts.layoutAdmin')

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.js"></script>--}}
<style>
    input {
        border: 0 !important;
        border-bottom: 1px solid #ddd !important;
        padding: 7px !important;
        width:  80%;
    }
</style>@section('content')

    <div class="container target">
        <div class="row">


        </div>




        <div class="row">
            <div class="col-sm-12">

                <nav class="navbar navbar-light" style="margin-left: 15px; margin-right: 15px;background-color: #e3f2fd;">

                    <div class="collapse navbar-collapse" id="navbarColor03" style="padding-left: 0px !important;">
                        <ul class="nav navbar-nav ">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('misDatos')}}">Personales <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('misDatosAcademicos')}}">Académicos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('misDatosLaborales')}}">Profesionales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('invitar')}}">Invitados</a>
                            </li>

                        </ul>
                    </div>

                </nav></div>
            {{ Form::open(array('route' => 'invitar', 'class' => 'form-style-8','files' => true)) }}




            <div class="col-sm-12" style="" contenteditable="false">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad">


                    <div class="panel panel-info">

                        <div class="panel-heading">Formulario de Invitación

                        </div>
                        <div class="panel-body">
                            <div class="row">



                                <div class=" col-md-12 col-lg-12 ">

                                    <table class="table table-user-information" id="mitabla">
                                        <div class="input-append">
                                            {{--<input id="fieldID4" type="text" name="imagen" style="display: none;">--}}
                                            {!! Form::text('imagen', $otros_datos['img'], ['id'=>'fieldID4','class' => 'misDatos','readonly' => 'true','style'=>'display:none;' ]) !!}

                                        </div>
                                        <tbody>
                                        <tr>
                                            <td><strong class="">Nombre Invitado:</strong></td>
                                            <td>{!! Form::text('first_name', null, ['id'=>'first_name','class' => 'misDatos' ,'required'=>'true']) !!}

                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="">Apellido Invitado:</strong></td>
                                            <td>{!! Form::text('last_name', null, ['id'=>'last_name','class' => 'misDatos' ,'required'=>'true']) !!}

                                            </td>
                                        </tr>
                                        <tr>
                                            <div class="form-group  {{ $errors->has('email') ? 'has-error' : ''}}">

                                            <td><strong class="">Correo Invitado:</strong></td>
                                            <td>{!! Form::text('email', null, ['id'=>'email','class' => 'misDatos','required'=>'true']) !!}

                                            </td>
                                                {!! $errors->first('email', '<div class="alert alert-danger"><p>
El correo electronico ya existe</p></div>') !!}

                                            </div>
                                        </tr>
                                        {{--<tr>--}}
                                            {{--<td><strong class="">Password:</strong></td>--}}
                                            {{--<td>--}}
                                                {{--<input class="field"  name="password" id="password" type="password" required >--}}

                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                        {{--<td><strong class=""> </strong></td>--}}
                                        {{--<td>--}}

                                            {{--<input name="password_confirmation" class="field" data-match="#new_password" data-match-error="Las contraseñas no coinciden" placeholder="Confirmar Contraseña" required   id="password_confirmation" type="password" value="">--}}

                                        {{--</td>--}}
                                        {{--</tr>--}}
                                        <tr>
                                            <td>
                                            {{--{!! Form::select($role->Slug, null, ['class' => 'form-control','placeholder '=>'Enter your  name']) !!}--}}
                                                {{--{!! Form::select('roles[]', ['3'=>'Profesor','4'=>'Invitado'] ,$roles, ['class' => 'form-control ]) !!}--}}

                                                {!! Form::select('roles[]', ['4'=>'Invitado'] ,$roles, ['id'=>'roles', 'class' => 'form-control','style'=>'display:none;']) !!}

                                            </td>
                                        </tr>
                                        <tr id="divRoles1">

                                        </tr>
                                        <tr>
                                            @if (Session::has('error'))
                                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                            @endif
                                            @if (Session::has('msg'))
                                                <div class="alert alert-info">{{ Session::get('msg') }}</div>
                                            @endif

                                        </tr>



                                        </tbody>

                                    </table>
                                    <div class='col-md-5' style="    margin-top: 10px;
                                      margin-left: 240px;">

                                        {!! Form::submit('Invitar', array('class'=>'btn btn-info ' ,'id'=>'boton' , 'style="margin-right:30px"')) !!}</td>

                                    </div>

                                    {!! Form::close() !!}

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


            <div id="table"></div>
        </div>
        <div class="col-md-10">
            <table id="asignaturas"  class="mdl-data-table" cellspacing="0" width="100%">
                @if(isset($invitados))
                    <thead>
                    <tr>
                        <th>Invitado</th>
                        <th>Email</th>
                        <th>Fecha Registro</th>
                        <th>Último Login</th>
                        <th>Número de Logins </th>
                        <th>Fecha Límite </th>

                    </tr>
                    </thead>

                    <tbody id="clickable">

                    @if( count($invitados)>0)
                        {{--{{print_r($invitados)}}--}}
                        {{--{!!  $asignaturas=array(json_decode($asignaturas,true)) !!}--}}
                        @foreach ($invitados as $invitado)
                            <tr>
                                <td>{{$invitado->getUsuario()->get()->first()->first_name }}</td>
                                <td>{{$invitado->getUsuario()->get()->first()->email }}</td>
                                <td>{{$invitado->getUsuario()->get()->first()->created_at }}</td>
                                <td>{{$invitado->getUsuario()->get()->first()->last_login }}</td>
                                <td>{{$invitado->numero_accesos }}</td>
                                <td id="prof">
                                    <span id="{{$invitado->fecha_limite }}"  class="prof">{{  \Carbon\Carbon::parse($invitado->fecha_limite)->format('d/m/Y') }}</span>
                                <br><a href="#myModal2" data-toggle="modal" id="{{$invitado->id}}" data-target="#myModal12">Cambiar Fecha </a></td>

                            </tr>

                        @endforeach
                        @else
                        <tr>
                            <td colspan=100% style="text-align: center; font-weight: bold;;"> Aun no tienes invitados </td>
                        </tr>
                    @endif
                    @endif
                    </tbody>

            </table>


        </div>
        <div class="col-md-2">
           <span class="pull-left">  <strong></strong>
           </span> <span><p>                    <a target="_blank" href="{{route('logAccesos')}}"><button type="button" class="btn btn-raised btn-secondary">LOGS ACCESOS</button></a></p></span>


        </div>


    </div>


    </div><!-- /#wrapper -->
    <!-- Modal -->
    <div class="modal fade" id="myModal12" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body">
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker2'>
                            <input name="fechaActualizar" id="fechaActualizar" type='text' class="form-control" />
                            <span class="input-group-addon">

                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                            <button type="submit" id="botonActualizarFecha">Confirmar</button>

                    </div>


            </div>

        </div>
    </div>
    </div>
@section('scripts')
=======
    {{--<script src="/js/jquery-3.3.1.min.js"></script>--}}

    {{--<script src="/js/jsquery.2.1.3.js"></script>--}}
    {{--<script src="/js/moment.js"></script>--}}
    {{--<script src="/js/boot-datetimepicker.js"></script>--}}
    {{--<script src="/js/twitterbootstrap.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>--}}

    <script src="/js/situJs/jquery.js"></script>
    <script src="/js/situJs/moment.min.js"></script>

    <script src="/js/situJs/_bootstrap.js"></script>

    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment.min.js"></script>--}}
    <script src="/js/situJs/bootstrap-datetimepicker.min.js"></script>

    @endsection


<script>
    $(document).ready(function () {




    $('#myModal12').on('shown.bs.modal', function (e) {
        var id= e.relatedTarget.id;
            $("#botonActualizarFecha").on('click',function () {
                var fecha=document.getElementById("fechaActualizar");
                var fechaActualizar=fecha.value;
                var mensaje = confirm("¿Confirma cambiar la fecha");
                console.log("aa");
                if (mensaje) {


                    $.ajax({
                        type: "get",
                        url: "{{ route('actualizarFecha') }}",
                        data: {
                            fecha: fechaActualizar,
                            id : id,
                        },

                        success: function (response) {
                            var element = document.createElement('a');
                            element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(response));
                            element.setAttribute('download', 'Fecha_actualizada_invitado.txt');

                            element.style.display = 'none';
                            document.body.appendChild(element);

                            element.click();

                            document.body.removeChild(element);
                            window.location.reload();

                        },
                        error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                            console.log(jqXHR);

                        }
                    });
                }


                else {
                    alert("a");
                }
            })


        });
        var myNodelist  =   document.getElementsByClassName("prof");

        var date1= new Date();
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
            var e = document.getElementById("roles");
            var strUser = e.options[e.selectedIndex].text;


                fecha_limite();

                date();



            $('#datetimepicker2').datetimepicker({
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },

                format: 'DD-MM-YYYY',
            });


        });






</script>

<script type="text/javascript">
    function date() {
        $(function () {
            $('#datetimepicker1').datetimepicker({
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
                format: 'YYYY-MM-DD',
            });


        });
      }


</script>

<script type="text/javascript">
    function fecha_limite() {
        $("#divRoles1").empty();


        var html=

            '             <td id="" class="form-group  "><strong>Fecha Límite</strong></td><td class="input-group date" id="datetimepicker1">'
            +  '<span class="input-group-addon">'
            +   '<span class="glyphicon glyphicon-calendar"></span>'
            +    ' </span>'

            +  ' <input type="text"  name="fecha_limite" required /></td>'

     +   ' </td> '  ;


        $("#divRoles1").append(html);






    }
</script>





@endsection
