@extends('layouts.layoutAdmin')
<script src="/js/jquery-3.3.1.min.js"></script>
{{--<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">--}}


{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.js"></script>--}}
<style>
    input[type=text]{
        border: 0 !important;
        border-bottom: 1px solid #ddd !important;
        padding: 7px !important;
        width:  80% !important;
        height: auto !important;
    }
    input[type=checkbox]{
        height: 10px !important;
    }

</style>
@section('content')

    <div class="container target">
        {{ Form::open(array('route' => 'actualizarDatosLaboral', 'class' => 'form-style-8','files' => true)) }}

        <div class="row">

            <div class="col-sm-10">
                <h1 class="">{{ $user->first_name  }}<?php
                    ?></h1>

                <button type="button" class="btn btn-success">Enviar Correo</button>  <button type="button"  class="btn btn-info">Enviar mensaje</button>
                <br>
            </div>
            <div class="col-sm-2">                    <img  id="myimage" title="profile image" src="{!! $otros_datos['img'] !!}" class="img-circle img-responsive" name="imagen">

                {{--<a data-toggle="modal" href="" data-target="#myModal" class="iframe-btn" type="button">--}}
                {{--<img  id="myimage" title="profile image" src="{!! $otros_datos['img'] !!}" class="img-circle img-responsive" name="imagen">--}}
                {{--<i id=" " class="fa fa-pencil"></i></a>--}}
            </div>
        </div>




        <div class="row">
            <div class="col-sm-3">
                <!--left col-->
                <ul class="list-group">
                    <li class="list-group-item text-muted" contenteditable="false">Perfil</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Fecha  de registro </strong></span>{{ $user->created_at  }} </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Fecha  último acceso</strong></span><span><p>{{ $user->last_login  }} </p></span>
                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Rol </strong></span> {{ $user->roles()->first()->slug }}</li>
                </ul>

                <div class="panel panel-default">
                    <div class="panel-heading">Redes Sociales <i class="fa fa-link fa-1x"></i>

                    </div>
                    <div class="panel-body">
                        <i class="fa fa-facebook fa-2x"></i>  {!! Form::text('facebook', null, ['id'=>'fieldIDfacebook','class' => 'misDatos','readonly' => 'true','value '=> $otros_datos['facebook'] ]) !!}
                        <a href="{!! $otros_datos['facebook'] !!}" class="">
                            <a href="#" id="clickableFb"> <i id=" " class="fa fa-pencil"></i></a>
                        </a>
                    </div>
                </div>

                <ul class="list-group">
                    <li class="list-group-item text-muted">Actividad <i class="fa fa-dashboard fa-1x"></i>

                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Shares</strong></span> 125
                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Likes</strong></span> 13
                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Posts</strong></span> 37
                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Followers</strong></span> 78
                    </li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-heading">Social Media</div>
                    <div class="panel-body"><i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i>
                        <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i
                                class="fa fa-google-plus fa-2x"></i>

                    </div>
                </div>
            </div>

            <div class="col-sm-9" style="" contenteditable="false">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad">


                    <div class="panel panel-info">
                        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                            <div class="collapse navbar-collapse" id="navbarColor03">
                                <ul class="nav navbar-nav ">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{route('misDatos')}}">Personales <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('misDatosAcademicos')}}">Académicos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Profesionales</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Otros datos</a>
                                    </li>
                                </ul>

                            </div>
                        </nav>

                        <div class="panel-body">
                            <div class="row">



                                <div class=" col-md-12 col-lg-12 ">

                                    <table class="table table-user-information" id="mitabla">
                                        <div class="input-append">

                                            {{--<input id="fieldID4" type="text" name="imagen" style="display: none;">--}}
                                            {!! Form::text('imagen', null, ['id'=>'fieldID4','class' => 'misDatos','readonly' => 'true','style'=>'display:none;' ]) !!}

                                        </div>
                                        <tbody id="tbody">

                                        <tr>
                                            <td><strong class="">Sector-Actividad</strong></td>
                                            <td>
                                                <select class="selectpicker dropup" id="sector" data-live-search="true" data-dropupAuto="true" name="sector" title = " Seleccione " data-noneSelectedText="">
                                                    <option value="-1"></option>
                                                    <option value="11">Actividades financieras, banca y seguros</option>
                                                    <option value="22">Agencia de publicidad</option>
                                                    <option value="1">Alimentación, bebidas y tabaco</option>
                                                    <option value="23">Animación - Videojuegos</option>
                                                    <option value="24">Asesoría de empresa</option>
                                                    <option value="8">Automoción</option>
                                                    <option value="6">Construcción</option>
                                                    <option value="25">Consultoría y auditoría</option>
                                                    <option value="18">Cultura y arte</option>
                                                    <option value="26">Deporte</option>
                                                    <option value="27">Diseño gráfico</option>
                                                    <option value="28">Distribución multimedia</option>
                                                    <option value="16">Educación</option>
                                                    <option value="2">Energético</option>
                                                    <option value="29">Estudio de arquitectura</option>
                                                    <option value="30">Farmacéutica - Laboratorio</option>
                                                    <option value="31">Fundación -  ONG</option>
                                                    <option value="32">Hostelería - Restauración</option>
                                                    <option value="33">Ingeniería</option>
                                                    <option value="12">Inmobiliario</option>
                                                    <option value="14">Institución - Administracion pública</option>
                                                    <option value="34">Institución religiosa</option>
                                                    <option value="13">Investigación</option>
                                                    <option value="35">Investigación de mercado</option>
                                                    <option value="36">Jurídico</option>
                                                    <option value="37">Marketing</option>
                                                    <option value="10">Medio de comunicación</option>
                                                    <option value="21">Organismo internacional</option>
                                                    <option value="38">Producción audiovisual</option>
                                                    <option value="39">Producción musical</option>
                                                    <option value="40">Publicación -  Editorial</option>
                                                    <option value="41">Recursos humanos</option>
                                                    <option value="17">Sanidad</option>
                                                    <option value="7">Textil, moda y belleza</option>
                                                    <option value="43">Tic</option>
                                                    <option value="44">Ninguno de los anteriores</option>
                                                    <option value="-1"></option>
                                                    <option value="1">Departamento de defensa y del espacio exterior</option>
                                                    <option value="2">Equipos informáticos</option>
                                                    <option value="3">Software</option>
                                                    <option value="4">Interconexión en red</option>
                                                    <option value="5">Internet</option>
                                                    <option value="6">Semiconductores</option>
                                                    <option value="7">Telecomunicaciones</option>
                                                    <option value="8">Derecho</option>
                                                    <option value="9">Servicios jurídicos</option>
                                                    <option value="10">Consultoría de estrategia y operaciones</option>
                                                    <option value="11">Biotecnología</option>
                                                    <option value="12">Profesiones médicas</option>
                                                    <option value="13">Atención sanitaria y hospitalaria</option>
                                                    <option value="14">Industria farmacéutica</option>
                                                    <option value="15">Veterinaria</option>
                                                    <option value="16">Servicios médicos</option>
                                                    <option value="17">Cosmética</option>
                                                    <option value="18">Industria textil y moda</option>
                                                    <option value="19">Artículos deportivos</option>
                                                    <option value="20">Tabaco</option>
                                                    <option value="21">Supermercados</option>
                                                    <option value="22">Producción alimentaria</option>
                                                    <option value="23">Electrónica de consumo</option>
                                                    <option value="24">Artículos de consumo</option>
                                                    <option value="25">Mobiliario</option>
                                                    <option value="26">Venta al por menor</option>
                                                    <option value="27">Entretenimiento</option>
                                                    <option value="28">Apuestas y casinos</option>
                                                    <option value="29">Ocio, viajes y turismo</option>
                                                    <option value="30">Hostelería</option>
                                                    <option value="31">Restaurantes</option>
                                                    <option value="32">Deportes</option>
                                                    <option value="33">Alimentación y bebidas</option>
                                                    <option value="34">Películas y cine</option>
                                                    <option value="35">Medios de difusión</option>
                                                    <option value="36">Museos e instituciones</option>
                                                    <option value="37">Bellas Artes</option>
                                                    <option value="38">Artes escénicas</option>
                                                    <option value="39">Instalaciones y servicios recreativos</option>
                                                    <option value="40">Banca</option>
                                                    <option value="41">Seguros</option>
                                                    <option value="42">Servicios financieros</option>
                                                    <option value="43">Bienes inmobiliarios</option>
                                                    <option value="44">Banca de inversiones</option>
                                                    <option value="45">Gestión de inversiones</option>
                                                    <option value="46">Contabilidad</option>
                                                    <option value="47">Construcción</option>
                                                    <option value="48">Materiales de construcción</option>
                                                    <option value="49">Arquitectura y planificación</option>
                                                    <option value="50">Ingeniería civil</option>
                                                    <option value="51">Industria aeroespacial y aviación</option>
                                                    <option value="52">Sector automovilístico</option>
                                                    <option value="53">Productos químicos</option>
                                                    <option value="54">Maquinaria</option>
                                                    <option value="55">Minería y metalurgia</option>
                                                    <option value="56">Petróleo y energía</option>
                                                    <option value="57">Construcción naval</option>
                                                    <option value="58">Servicios públicos</option>
                                                    <option value="59">Sector textil</option>
                                                    <option value="60">Productos de papel y forestales</option>
                                                    <option value="61">Manufactura ferroviaria</option>
                                                    <option value="62">Agricultura</option>
                                                    <option value="63">Ganadería</option>
                                                    <option value="64">Lácteos</option>
                                                    <option value="65">Piscicultura</option>
                                                    <option value="66">Educación primaria/secundaria</option>
                                                    <option value="67">Enseñanza superior</option>
                                                    <option value="68">Gestión educativa</option>
                                                    <option value="69">Investigación</option>
                                                    <option value="70">Ejército</option>
                                                    <option value="71">Oficina legislativa</option>
                                                    <option value="72">Judicial</option>
                                                    <option value="73">Asuntos internacionales</option>
                                                    <option value="74">Administración gubernamental</option>
                                                    <option value="75">Oficina ejecutiva</option>
                                                    <option value="76">Cumplimiento de la ley</option>
                                                    <option value="77">Protección civil</option>
                                                    <option value="78">Política pública</option>
                                                    <option value="79">Marketing y publicidad</option>
                                                    <option value="80">Periódicos</option>
                                                    <option value="81">Publicaciones</option>
                                                    <option value="82">Imprenta</option>
                                                    <option value="83">Servicio de información</option>
                                                    <option value="84">Bibliotecas</option>
                                                    <option value="85">Servicios medioambientales</option>
                                                    <option value="86">Envío de paquetes y carga</option>
                                                    <option value="87">Servicios para el individuo y la familia</option>
                                                    <option value="88">Instituciones religiosas</option>
                                                    <option value="89">Organización cívica y social</option>
                                                    <option value="90">Servicio al consumidor</option>
                                                    <option value="91">Transporte por carretera o ferrocarril</option>
                                                    <option value="92">Almacenamiento</option>
                                                    <option value="93">Aeronáutica/Aviación</option>
                                                    <option value="94">Naval</option>
                                                    <option value="95">Servicios y tecnologías de la información</option>
                                                    <option value="96">Investigación de mercado</option>
                                                    <option value="97">Relaciones públicas y comunicaciones</option>
                                                    <option value="98">Diseño</option>
                                                    <option value="99">Gestión de organizaciones sin ánimo de lucro</option>
                                                    <option value="100">Recaudación de fondos</option>
                                                    <option value="101">Desarrollo de programación</option>
                                                    <option value="102">Escritura y edición</option>
                                                    <option value="103">Dotación y selección de personal</option>
                                                    <option value="104">Formación profesional y capacitación</option>
                                                    <option value="105">Capital de riesgo y capital privado</option>
                                                    <option value="106">Organización política</option>
                                                    <option value="107">Traducción y localización</option>
                                                    <option value="108">Videojuegos</option>
                                                    <option value="109">Servicios de eventos</option>
                                                    <option value="110">Artesanía</option>
                                                    <option value="111">Manufactura eléctrica/electrónica</option>
                                                    <option value="112">Medios de comunicación en línea</option>
                                                    <option value="113">Nanotecnología</option>
                                                    <option value="114">Música</option>
                                                    <option value="115">Logística y cadena de suministro</option>
                                                    <option value="116">Plásticos</option>
                                                    <option value="117">Seguridad del ordenador y de las redes</option>
                                                    <option value="118">Tecnología inalámbrica</option>
                                                    <option value="119">Resolución de conflictos por terceras partes</option>
                                                    <option value="120">Seguridad e investigaciones</option>
                                                    <option value="121">Servicios infraestructurales</option>
                                                    <option value="122">Subcontrataciones/Offshoring</option>
                                                    <option value="123">Sanidad, bienestar y ejercicio</option>
                                                    <option value="124">Medicina alternativa</option>
                                                    <option value="125">Producción multimedia</option>
                                                    <option value="126">Animación</option>
                                                    <option value="127">Bienes inmobiliarios comerciales</option>
                                                    <option value="128">Mercados de capital</option>
                                                    <option value="129">Gabinetes estratégicos</option>
                                                    <option value="130">Filantropía</option>
                                                    <option value="131">E-learning</option>
                                                    <option value="132">Venta al por mayor</option>
                                                    <option value="133">Importación y exportación</option>
                                                    <option value="134">Ingeniería industrial o mecánica</option>
                                                    <option value="135">Fotografía</option>
                                                    <option value="136">Recursos humanos</option>
                                                    <option value="137">Material y equipo de negocios</option>
                                                    <option value="138">Atención a la salud mental</option>
                                                    <option value="139">Diseño gráfico</option>
                                                    <option value="140">Desarrollo y comercio internacional</option>
                                                    <option value="141">Vinos y licores</option>
                                                    <option value="142">Artículos de lujo y joyas</option>
                                                    <option value="143">Energía renovable y medio ambiente</option>
                                                    <option value="144">Cristal, cerámica y hormigón</option>
                                                    <option value="145">Embalaje y contenedores</option>
                                                    <option value="146">Automación industrial</option>
                                                    <option value="147">Relaciones gubernamentales</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="">Ubicacion</strong></td>
                                            <td>
                                                <select class="selectpicker dropup" name="ubicacion" id="ubicacion" data-live-search="true" data-dropupAuto="true" title = " Seleccione " data-noneSelectedText="">

                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><strong class="">Cargo</strong></td>
                                            <td>{!! Form::text('cargo',"", ['id'=>'cargo','class' => 'misDatos','required'=>'true' ]) !!}

                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="">Empresa</strong></td>
                                            <td>{!! Form::text('empresa',"", ['id'=>'empresa','class' => 'misDatos','required'=>'true' ]) !!}

                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="">Descripción</strong></td>
                                            <td><textarea  class="form-control" rows="4" cols="50" placeholder="Añade algun detalle..."></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            @if (Session::has('error'))
                                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                            @endif
                                            @if (Session::has('msg'))
                                                <div class="alert alert-info">{{ Session::get('msg') }}</div>
                                            @endif

                                        </tr>

                                        <tr>
                                            <td><strong class=""> Fecha de Inicio</strong> </td>
                                         <td>  <div class="input-group">
                                                <span   class="input-group-addon"><i class="fa fa-calendar " aria-hidden="true"></i></span>
                                                <div class="form-group">
                                                    {!! Form::text('startDate',null, array('class' => 'form-control', 'id'=>'startDate', 'placeholder' => 'dd-mm-YY','style'=>'    margin-bottom: 0px !important;')) !!}
                                                </div>
                                                    {{--<span class="input-group-addon"><i class="fa fa-calendar " aria-hidden="true"></i></span>--}}
                                                    {{--<div class="form-group">--}}
                                                        {{--{!! Form::text('endDate', null, array('class' => 'form-control', 'id'=>'endDate', 'placeholder' => 'dd-mm-YY')) !!}--}}


                                                    </div>
                                                {{--</div>--}}
                                         </td>


                                        </tr>
                                        <tr>
                                            <td> <strong class="">Fecha de Finalizacion </strong></td>
                                            <td>  <div class="input-group">
                                                    <span   class="input-group-addon"><i class="fa fa-calendar " aria-hidden="true"></i></span>
                                                    <div class="form-group">
                                                    {!! Form::text('endDate', null, array('class' => 'form-control', 'id'=>'endDate', 'placeholder' => 'dd-mm-YY' , 'style'=>'    margin-bottom: 0px !important;')) !!}
                                                </div>
                                                </div>
                                                {!! Form::label('text', 'En curso') !!}

                                                {{ Form::checkbox('en_curso', 'En curso ' ,null, ['class' => 'form-check-input' ,"style"=>'height:auto;'])}}


                                            </td>
                                        </tr>

                                        {{--</tr>--}}
                                {{--<div class='col-md-5'>--}}
                                    {{--<label for="Fecha de  Finalizacion" class="cols-sm-2 control-label">Fecha de Finalizacion</label>--}}

                                    {{--<div class="input-group">--}}
                                        {{--<span class="input-group-addon"><i class="fa fa-calendar " aria-hidden="true"></i></span>--}}
                                        {{--<div class="form-group">--}}


                                        {{--</div>--}}

                                    {{--</div>--}}



                                        </tbody>

                                    </table>
                                    <div class='col-md-5' style="    margin-top: 10px;
                                      margin-left: 240px;">
                                        {{--<input type="button" value="Add another text input" onClick="addInput();">--}}


                                    </div>
                                    {!! Form::submit('Actualizar', array('class'=>'btn btn-primary' , 'id'=>'boton','style="margin-right:30px"')) !!}</td>


                                </div>
                                {{ Form::close() }}

                            </div>
                        </div>

                    </div>
                    <div class="panel-footer">
                        <

                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button"
                           class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button"
                               class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button"
                               class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>

                </div>
            </div>
        </div>


        <div id="push"></div>
    </div>



    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body">
                    <iframe width="700" height="400" src="/js/tinymce/js/tinymce/plugins/responsive_filemanager/filemanager/dialog.php?type=2&field_id=fieldID4'&fldr=" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    </div><!-- /#wrapper -->

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script src="/js/tinymce/js/tinymce/jquery.tinymce.min.js"></script>
    <script src="/js/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="/js/tinymce/js/tinymce/init-tinymce.js"></script>
    <script src="/js/tinymce/js/tinymce/langs/es.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


@endsection
<script>      $(function() {
        $('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
    });
</script>
<script>

    $(document).ready(function () {
        $.datepicker.setDefaults($.datepicker.regional['es']);
        $(function () {
            document.getElementById("endDate").disabled = true;

            $("#startDate").datepicker({

                    onSelect: function(date) {
                        document.getElementById("endDate").disabled = false;

                        $("#endDate" ).datepicker("destroy");

                        $("#endDate").datepicker({
                            minDate: date,
                            inline : false

                        })
                        $( "#endDate" ).datepicker("refresh");
                        $("#endDate").datepicker('setDate', null);

                    },

                }




            );

        });
        document.getElementById('boton').disabled = true;
        $('i').on('click',function () {
            $('#boton').removeClass('btn btn-info disabled');
            $('#boton').addClass('btn btn-success');
            document.getElementById('boton').disabled = false;


        })
        $('#mitabla input').on('change',function () {
            $('#boton').removeClass('btn btn-info disabled');
            $('#boton').addClass('btn btn-success');
            document.getElementById('boton').disabled = false;


        })

    });
</script>
<script>function responsive_filemanager_callback(field_id){
        console.log(field_id);

        var url=jQuery('#'+field_id).val();
        // $('#myModal').modal('hide');


        $('#myimage').attr('src', url);

    }



</script>

<script>


    var counter = 1;
    var limit = 3;
    function addInput(){

        var newdiv = document.createElement('tr');
        newdiv.innerHTML =  "<td><strong class=''>Cargo:</strong></td> <td><br><input type='text' class='misDatos' name='cargo[]'></td>";
        document.getElementById("tbody").appendChild(newdiv);

        counter++;

    }

    function getAsignaturas () {
        var x = document.getElementById("cursoSelect").selectedIndex;
        var curso=(document.getElementsByTagName("option")[x].value);

        $.ajax({
            type:"get",
            url     : "{{ url('Alumno/alumnoDatos/datosAcademicos/') }}/"+curso ,
            encode  : true,
            data: {
                curso: curso,
            },
            success: function(response){ // What to do if we succeed
                window.location.href= "{{ route('misDatosAcademicos') }}"+"/"+curso;
                console.log(response);

            },
            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });



    }




</script>

<script>

    $(document).ready(function() {
        var sel = document.getElementById('sector');
        var opts = sel.options;


        for (var i=0;i<opts.length;i++) {
            opts[i].value = opts[i].text;
        }
            // $('#password').attr('readonly', false).focus().css("background-color", "#bfe1e847").val('');
            $('.en_curso').change(function(ev) {
                if ( $(this).is(':checked') ) {
                    document.getElementById("endDate").disabled = true;
                }
                else {

                    $("#endDate").datepicker({
                        inline : false

                    })
                    $( "#endDate" ).datepicker("refresh");

                    document.getElementById("endDate").disabled = false;
                }

            });



        // $.datepicker.setDefaults($.datepicker.regional['es']);
        $(function () {
            document.getElementById("endDate").disabled = true;

            $("#startDate").datepicker({

                    onSelect: function(date) {
                        document.getElementById("endDate").disabled = false;

                        $("#endDate" ).datepicker("destroy");

                        $("#endDate").datepicker({
                            minDate: date,
                            inline : false

                        })
                        $( "#endDate" ).datepicker("refresh");
                        $("#endDate").datepicker('setDate', null);

                    },

                }




            );

        });

    });

    </script>
<script>
    $(document).ready(function() {
        var sel = document.getElementById('ubicacion');
        // var opts = sel.options;

        var ciudades= "Andalucia|Aragon|Asturias|Baleares|" +
            "Canarias|Cantabria|Castilla y Leon|Castilla-La Mancha|Cataluña|Ceuta|" +
            "Communidad Valenciana|Extremadura|Galicia|La Rioja|" +
            "Madrid|Melilla|Murcia|Navarra|Pais Vasco" ;
        var state_arr = ciudades.split("|");

            $.each(state_arr, function (i, item) {
                $('#ubicacion').append($('<option>', {
                    value: item,
                    text : item
                }));
            });





    });


</script>

