@extends('layouts.layoutAdmin')
<script src="/js/jquery-3.3.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.js"></script>

<style>
    input {
        border: 0 !important;
        border-bottom: 1px solid #ddd !important;
        padding: 7px !important;
        width:  80%;
    }
</style>
@section('content')

    <div class="container target">
        <div class="row">
            {{--{{ Form::open(array('route' => 'actualizarDatosAcademicos', 'class' => 'form-style-8','files' => true)) }}--}}


            <div class="col-sm-2" style="float: right;">
                    <img  id="myimage" title="profile image" src="{!! $otros_datos['img'] !!}" class="img-circle img-responsive" name="imagen">
            </div>
        </div>




        <div class="row">
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
                            <a class="nav-link" href="{{route('misDatosLaborales')}}">Profesionales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('invitar')}}">Invitados</a>
                        </li>

                    </ul>

                </div>
            </nav>

            {{ Form::open(array('route' => 'actualizarDatosAcademicos', 'class' => 'form-style-8','files' => true)) }}


            <div class="col-sm-6" style="" contenteditable="false">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad">


                    <div class="panel panel-info">


                        <div class="panel-body">
                            <div class="row">



                                <div class=" col-md-12 col-lg-12 ">

                                    <table class="table table-user-information" id="mitabla">
                                        <div class="input-append">

                                            {{--<input id="fieldID4" type="text" name="imagen" style="display: none;">--}}
                                            {!! Form::text('imagen', null, ['id'=>'fieldID4','class' => 'misDatos','readonly' => 'true','style'=>'display:none;' ]) !!}

                                        </div>
                                        <tbody id="tbody">
                                        <th style="border: none;"><h1>Formacion</h1></th>

                                        <tr>
                                            <td><strong class="">Centro:</strong></td>
                                            <td>{!! Form::text('centro', null, ['id'=>'first_name','class' => 'misDatos']) !!}


                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="">Disciplina Academica</strong></td>
                                            <td>
                                                <select form="formulario" class="selectpicker dropup" name="disciplina" id="disciplina" data-live-search="true" data-dropupAuto="false" title = " Seleccione " data-noneSelectedText="">
                                                    <option value="1" >Administración y Dirección de Empresas</option>
                                                    <option value="27" >Arquitectura</option>
                                                    <option value="23" >Bellas Artes</option>
                                                    <option value="357" >Biomedicina</option>
                                                    <option value="8" >Bioquímica</option>
                                                    <option value="14" >Biotecnología</option>
                                                    <option value="24" >CAFYD</option>
                                                    <option value="6" >Ciencias Empresariales</option>
                                                    <option value="5" >Comunicación Audiovisual</option>
                                                    <option value="358" >Creación y Narración de Videojuegos</option>
                                                    <option value="359" >Criminología</option>
                                                    <option value="3" >Derecho</option>
                                                    <option value="29" >Diseño</option>
                                                    <option value="7" >Doble grado en Administración y Dirección de Empresas y Derecho</option>
                                                    <option value="69" >Doble Grado en Administración y Dirección de Empresas y Marketing</option>
                                                    <option value="356" >Doble Grado en Administración y Dirección de Empresas y Relaciones Internacionales</option>
                                                    <option value="72" >Doble Grado en Bellas Artes y Comunicación Audiovisual</option>
                                                    <option value="377" >Doble Grado en Bellas Artes y Creación y Narración de Videojuegos</option>
                                                    <option value="376" >Doble Grado en Bellas Artes y Diseño</option>
                                                    <option value="37" >Doble Grado en Comunicación Audiovisual y Publicidad</option>
                                                    <option value="373" >Doble Grado en Comunicación Audiovisual y Videojuegos</option>
                                                    <option value="374" >Doble Grado en Derecho y Criminología</option>
                                                    <option value="375" >Doble Grado en Derecho y Relaciones Laborales</option>
                                                    <option value="39" >Doble Grado en Diseño y Publicidad</option>
                                                    <option value="52" >Doble Grado en Farmacia y Biotecnología</option>
                                                    <option value="35" >Doble Grado en Periodismo y Comunicación Audiovisual</option>
                                                    <option value="36" >Doble Grado en Periodismo y Publicidad</option>
                                                    <option value="372" >Doble Grado en Publicidad y Marketing </option>
                                                    <option value="368" >Doble Grado en Relaciones Internacionales y Derecho</option>
                                                    <option value="369" >Doble Grado en Relaciones Internacionales y Periodismo</option>
                                                    <option value="370" >Doble Grado en Relaciones Internacionales y Publicidad </option>
                                                    <option value="2" >Economía</option>
                                                    <option value="25" >Educación Infantil</option>
                                                    <option value="26" >Educación Primaria</option>
                                                    <option value="18" >Enfermería</option>
                                                    <option value="51" >Farmacia</option>
                                                    <option value="22" >Fisioterapia</option>
                                                    <option value="360" >Gastronomía</option>
                                                    <option selected="selected" value="19" >Ingeniería Informática</option>
                                                    <option value="20" >Ingeniería Técnica en Informática de Gestión</option>
                                                    <option value="21" >Ingeniería Técnica en Informática de Sistemas</option>
                                                    <option value="361" >Maestro, Especialidad de Educación Física</option>
                                                    <option value="362" >Marketing</option>
                                                    <option value="49" >Medicina</option>
                                                    <option value="4" >Periodismo</option>
                                                    <option value="53" >Psicología</option>
                                                    <option value="17" >Publicidad</option>
                                                    <option value="366" >Relaciones Internacionales</option>
                                                    <option value="54" >Relaciones Laborales y Recursos Humanos</option>
                                                    <option value="60" optiongroup="POSTGRADO">Curso de Especialización en Periodismo y Moda</option>
                                                    <option value="64" optiongroup="POSTGRADO">Doctorado en Humanidades y Ciencias Sociales</option>
                                                    <option value="78" optiongroup="POSTGRADO">Máster en Administración y  Dirección de Empresas, MBA Internacional</option>
                                                    <option value="65" optiongroup="POSTGRADO">Máster en Análisis y Control de Medicamentos</option>
                                                    <option value="80" optiongroup="POSTGRADO">Máster en Comercio Internacional</option>
                                                    <option value="59" optiongroup="POSTGRADO">Máster en Comunicación y Marketing de Moda</option>
                                                    <option value="79" optiongroup="POSTGRADO">Máster en Dirección de Empresas. MBA Executive</option>
                                                    <option value="363" optiongroup="POSTGRADO">Máster en Dirección Estratégica de la Empresa</option>
                                                    <option value="71" optiongroup="POSTGRADO">Máster en Terapias Avanzadas e Investigación Biotecnológica</option>
                                                    <option value="63" optiongroup="POSTGRADO">Máster Universitario de Profesor de Educación Secundaria Obligatoria y Bachillerato, Formación Profesional y Enseñanzas de Idiomas</option>
                                                    <option value="55" optiongroup="POSTGRADO">Máster Universitario en Abogacía</option>
                                                    <option value="56" optiongroup="POSTGRADO">Máster Universitario en Acción Política, Fortalecimiento Institucional y Participación Ciudadana al Estado de Derecho</option>
                                                    <option value="364" optiongroup="POSTGRADO">Máster Universitario en Administración y Dirección de Empresas, MBA Executive</option>
                                                    <option value="74" optiongroup="POSTGRADO">Máster Universitario en Banca y Finanzas</option>
                                                    <option value="76" optiongroup="POSTGRADO">Máster Universitario en Dirección de Empresas. MBA Executive</option>
                                                    <option value="82" optiongroup="POSTGRADO">Máster Universitario en Dirección y Administración </option>
                                                    <option value="70" optiongroup="POSTGRADO">Máster Universitario en Dirección y Gestión para la Calidad de Centros Educativos</option>
                                                    <option value="58" optiongroup="POSTGRADO">Máster Universitario en Periodismo Audiovisual</option>
                                                    <option value="77" optiongroup="POSTGRADO">Máster Universitario en Producción y Realización en Radio y Televisión</option>
                                                    <option value="365" optiongroup="POSTGRADO">Máster Universitario en Profesor de Educación Secundaria Obligatoria</option>
                                                    <option value="378" optiongroup="POSTGRADO">Máster Universitario en Psicología General Sanitaria</option>
                                                    <option value="73" optiongroup="POSTGRADO">Máster Universitario en Tecnologías de Análisis de Fuentes Abiertas</option>
                                                    <option value="61" optiongroup="POSTGRADO">Máster Unviersitario en Humanidades</option>
                                                    <option value="57" optiongroup="POSTGRADO">Máster Unviersitario en Prevención de Riesgos Laborales</option>
                                                    <option value="75" optiongroup="POSTGRADO">Máster Unviersitario en Terapias Avanzadas e Innovación Biotecnológica</option>

                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="">Titulacion</strong></td>
                                            <td>
                                                <select form="formulario" class="selectpicker dropup" name="disciplina" id="disciplina" data-live-search="true" data-dropupAuto="false" title = " Seleccione " data-noneSelectedText="">
                                                    <option value="1" >Administración y Dirección de Empresas</option>
                                                    <option value="27" >Arquitectura</option>
                                                    <option value="23" >Bellas Artes</option>
                                                    <option value="357" >Biomedicina</option>
                                                    <option value="8" >Bioquímica</option>
                                                    <option value="14" >Biotecnología</option>
                                                    <option value="24" >CAFYD</option>
                                                    <option value="6" >Ciencias Empresariales</option>
                                                    <option value="5" >Comunicación Audiovisual</option>
                                                    <option value="358" >Creación y Narración de Videojuegos</option>
                                                    <option value="359" >Criminología</option>
                                                    <option value="3" >Derecho</option>
                                                    <option value="29" >Diseño</option>
                                                    <option value="7" >Doble grado en Administración y Dirección de Empresas y Derecho</option>
                                                    <option value="69" >Doble Grado en Administración y Dirección de Empresas y Marketing</option>
                                                    <option value="356" >Doble Grado en Administración y Dirección de Empresas y Relaciones Internacionales</option>
                                                    <option value="72" >Doble Grado en Bellas Artes y Comunicación Audiovisual</option>
                                                    <option value="377" >Doble Grado en Bellas Artes y Creación y Narración de Videojuegos</option>
                                                    <option value="376" >Doble Grado en Bellas Artes y Diseño</option>
                                                    <option value="37" >Doble Grado en Comunicación Audiovisual y Publicidad</option>
                                                    <option value="373" >Doble Grado en Comunicación Audiovisual y Videojuegos</option>
                                                    <option value="374" >Doble Grado en Derecho y Criminología</option>
                                                    <option value="375" >Doble Grado en Derecho y Relaciones Laborales</option>
                                                    <option value="39" >Doble Grado en Diseño y Publicidad</option>
                                                    <option value="52" >Doble Grado en Farmacia y Biotecnología</option>
                                                    <option value="35" >Doble Grado en Periodismo y Comunicación Audiovisual</option>
                                                    <option value="36" >Doble Grado en Periodismo y Publicidad</option>
                                                    <option value="372" >Doble Grado en Publicidad y Marketing </option>
                                                    <option value="368" >Doble Grado en Relaciones Internacionales y Derecho</option>
                                                    <option value="369" >Doble Grado en Relaciones Internacionales y Periodismo</option>
                                                    <option value="370" >Doble Grado en Relaciones Internacionales y Publicidad </option>
                                                    <option value="2" >Economía</option>
                                                    <option value="25" >Educación Infantil</option>
                                                    <option value="26" >Educación Primaria</option>
                                                    <option value="18" >Enfermería</option>
                                                    <option value="51" >Farmacia</option>
                                                    <option value="22" >Fisioterapia</option>
                                                    <option value="360" >Gastronomía</option>
                                                    <option selected="selected" value="19" >Ingeniería Informática</option>
                                                    <option value="20" >Ingeniería Técnica en Informática de Gestión</option>
                                                    <option value="21" >Ingeniería Técnica en Informática de Sistemas</option>
                                                    <option value="361" >Maestro, Especialidad de Educación Física</option>
                                                    <option value="362" >Marketing</option>
                                                    <option value="49" >Medicina</option>
                                                    <option value="4" >Periodismo</option>
                                                    <option value="53" >Psicología</option>
                                                    <option value="17" >Publicidad</option>
                                                    <option value="366" >Relaciones Internacionales</option>
                                                    <option value="54" >Relaciones Laborales y Recursos Humanos</option>
                                                    <option value="60" optiongroup="POSTGRADO">Curso de Especialización en Periodismo y Moda</option>
                                                    <option value="64" optiongroup="POSTGRADO">Doctorado en Humanidades y Ciencias Sociales</option>
                                                    <option value="78" optiongroup="POSTGRADO">Máster en Administración y  Dirección de Empresas, MBA Internacional</option>
                                                    <option value="65" optiongroup="POSTGRADO">Máster en Análisis y Control de Medicamentos</option>
                                                    <option value="80" optiongroup="POSTGRADO">Máster en Comercio Internacional</option>
                                                    <option value="59" optiongroup="POSTGRADO">Máster en Comunicación y Marketing de Moda</option>
                                                    <option value="79" optiongroup="POSTGRADO">Máster en Dirección de Empresas. MBA Executive</option>
                                                    <option value="363" optiongroup="POSTGRADO">Máster en Dirección Estratégica de la Empresa</option>
                                                    <option value="71" optiongroup="POSTGRADO">Máster en Terapias Avanzadas e Investigación Biotecnológica</option>
                                                    <option value="63" optiongroup="POSTGRADO">Máster Universitario de Profesor de Educación Secundaria Obligatoria y Bachillerato, Formación Profesional y Enseñanzas de Idiomas</option>
                                                    <option value="55" optiongroup="POSTGRADO">Máster Universitario en Abogacía</option>
                                                    <option value="56" optiongroup="POSTGRADO">Máster Universitario en Acción Política, Fortalecimiento Institucional y Participación Ciudadana al Estado de Derecho</option>
                                                    <option value="364" optiongroup="POSTGRADO">Máster Universitario en Administración y Dirección de Empresas, MBA Executive</option>
                                                    <option value="74" optiongroup="POSTGRADO">Máster Universitario en Banca y Finanzas</option>
                                                    <option value="76" optiongroup="POSTGRADO">Máster Universitario en Dirección de Empresas. MBA Executive</option>
                                                    <option value="82" optiongroup="POSTGRADO">Máster Universitario en Dirección y Administración </option>
                                                    <option value="70" optiongroup="POSTGRADO">Máster Universitario en Dirección y Gestión para la Calidad de Centros Educativos</option>
                                                    <option value="58" optiongroup="POSTGRADO">Máster Universitario en Periodismo Audiovisual</option>
                                                    <option value="77" optiongroup="POSTGRADO">Máster Universitario en Producción y Realización en Radio y Televisión</option>
                                                    <option value="365" optiongroup="POSTGRADO">Máster Universitario en Profesor de Educación Secundaria Obligatoria</option>
                                                    <option value="378" optiongroup="POSTGRADO">Máster Universitario en Psicología General Sanitaria</option>
                                                    <option value="73" optiongroup="POSTGRADO">Máster Universitario en Tecnologías de Análisis de Fuentes Abiertas</option>
                                                    <option value="61" optiongroup="POSTGRADO">Máster Unviersitario en Humanidades</option>
                                                    <option value="57" optiongroup="POSTGRADO">Máster Unviersitario en Prevención de Riesgos Laborales</option>
                                                    <option value="75" optiongroup="POSTGRADO">Máster Unviersitario en Terapias Avanzadas e Innovación Biotecnológica</option>

                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="">Ubicacion</strong></td>
                                            <td>
                                                <select form="formulario" class="selectpicker dropup" name="ubicacion" id="ubicacion" data-live-search="true" data-dropupAuto="false" title = " Seleccione " data-noneSelectedText="">

                                                </select>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><strong class="">Descripcion:</strong></td>
                                            <td>{!! Form::textarea('descripcion', null, ['id'=>'first_name','class' => 'misDatos']) !!}


                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong class=""> Fecha de Inicio</strong> </td>
                                            <td>  <div class="input-group">
                                                    <span   class="input-group-addon"><i class="fa fa-calendar " aria-hidden="true"></i></span>
                                                    <div class="form-group">
                                                        {!! Form::text('startDate',null, array('class' => 'form-control', 'id'=>'startDate', 'placeholder' => 'dd-mm-YY','style'=>'    margin-bottom: 0px !important;')) !!}
                                                    </div>


                                                </div>
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

                                                {{ Form::checkbox('en_curso', 'En curso ' ,null, ['class' => 'en_curso' ,"style"=>'height:auto;'])}}


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


                                        <input class="field" name="old_password"  id="old_password" type="hidden" value="{{$user->password}}">


                                        </tbody>

                                    </table>
                                    <tr>

                                   <td>     {!! Form::submit('Actualizar', array('class'=>'btn btn-primary' , 'id'=>'boton','style="margin-right:30px"')) !!}</td>
                                    </td>
                                    </tr>
                                    {{ Form::close() }}


                                </div>

                            </div>
                        </div>

                    </div>
                        <div class="panel-footer">
                            <table id="asignaturas"  class="mdl-data-table" cellspacing="0" width="100%">
                            @if(isset($curso))
                                    <thead>
                                    <tr>
                                        <th>Curso</th>
                                        <th>Asignatura</th>
                                        <th>Seleccionar</th>
                                    </tr>
                                    </thead>

                                    <tbody id="clickable">
                                    <div class="form-group">
                                        {!! Form::label('text', 'Curso Académico') !!}
                                        {{ Form::select('', ['1'=>'1º','2'=>'2º','3'=>'3º','4'=>'4º','5'=>'OTROS'], $year,
                                        ['aria-controls'=>'asignaturas','class' => 'form-control input-sm','onChange'=>'getAsignaturas()' ,'id'=>'cursoSelect']) }}

                                    </div>

                                    @if(!empty($curso->asignaturas))
                                    {{--{!!  $asignaturas=array(json_decode($asignaturas,true)) !!}--}}
                                    @foreach (json_decode($asignaturas,true) as $asignatura)
                                        <tr>
                                            <td>{{$curso->curso}}</td>
                                            <td id="asignatura">{!!  print_r($asignatura)[0] !!}</td>
                                            <td id="seleccionar"> <a data-original-title="Remove this user" data-toggle="tooltip" type="button"
                                                                     class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a></td>
                                        </tr>

                                    @endforeach
                                    @endif
                                    @endif
                                    </tbody>

                            </table>


                        </div>

                    </div>
                </div>
            {{ Form::open(array('route' => 'actualizarDatosAcademicos', 'class' => 'form-style-8','files' => true)) }}


            <div class="col-sm-6" style="" contenteditable="false">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad">


                    <div class="panel panel-info">


                        <div class="panel-body">
                            <div class="row">



                                <div class=" col-md-12 col-lg-12 ">

                                    <table class="table table-user-information" id="mitabla">
                                        <div class="input-append">

                                            {{--<input id="fieldID4" type="text" name="imagen" style="display: none;">--}}
                                            {!! Form::text('imagen', null, ['id'=>'fieldID4','class' => 'misDatos','readonly' => 'true','style'=>'display:none;' ]) !!}

                                        </div>
                                        <tbody id="tbody">
                                        <th style="border: none;"><h1>Asignaturas</h1></th>
                                        <tr>
                                            <td><strong class="">Grado:</strong></td>
                                            <td>{!! Form::text('grado', null, ['id'=>'first_name','class' => 'misDatos','readonly' => 'true','value '=> $curso->grado ]) !!}

                                                <a href="#" id="clickable"> <i id=" " class="fa fa-pencil"></i></a>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="">Curso:</strong></td>
                                            <td>
                                                {{--{!! Form::text('curso', null, ['id'=>'last_name','class' => 'misDatos','readonly' => 'true','value '=> $user->last_name ]) !!}--}}
                                                {{ Form::select('curso', ['1'=>'1º','2'=>'2º','3'=>'3º','4'=>'4º','5'=>'OTROS'], ['class' => 'misDatos','id'=>'curso']) }}


                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="">Agregar Asignatura:</strong></td>
                                            <td>{!! Form::text('asignatura[]',"", ['id'=>'asignatura','class' => 'misDatos','required'=>'true' ]) !!}




                                                <a  id="mas"  value="" onclick="addInput();"  >
                                                    <i  style="    font-size: 26px; cursor: pointer" class="fa fa-plus-circle"></i>

                                                </a>
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


                                        <input class="field" name="old_password"  id="old_password" type="hidden" value="{{$user->password}}">


                                        </tbody>

                                    </table>
                                    <tr>

                                        <td>     {!! Form::submit('Actualizar', array('class'=>'btn btn-primary' , 'id'=>'boton','style="margin-right:30px"')) !!}</td>
                                        </td>
                                    </tr>
                                    {{ Form::close() }}


                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="panel-footer">
                        <table id="asignaturas"  class="mdl-data-table" cellspacing="0" width="100%">
                            @if(isset($curso))
                                <thead>
                                <tr>
                                    <th>Curso</th>
                                    <th>Asignatura</th>
                                    <th>Seleccionar</th>
                                </tr>
                                </thead>

                                <tbody id="clickable">
                                <div class="form-group">
                                    {!! Form::label('text', 'Curso Académico') !!}
                                    {{ Form::select('', ['1'=>'1º','2'=>'2º','3'=>'3º','4'=>'4º','5'=>'OTROS'], $year,
                                    ['aria-controls'=>'asignaturas','class' => 'form-control input-sm','onChange'=>'getAsignaturas()' ,'id'=>'cursoSelect']) }}

                                </div>

                                @if(!empty($curso->asignaturas))
                                    {{--{!!  $asignaturas=array(json_decode($asignaturas,true)) !!}--}}
                                    @foreach (json_decode($asignaturas,true) as $asignatura)
                                        <tr>
                                            <td>{{$curso->curso}}</td>
                                            <td id="asignatura">{!!  print_r($asignatura)[0] !!}</td>
                                            <td id="seleccionar"> <a data-original-title="Remove this user" data-toggle="tooltip" type="button"
                                                                     class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a></td>
                                        </tr>

                                    @endforeach
                                @endif
                                @endif
                                </tbody>

                        </table>


                    </div>

                </div>
            </div>
            </div>


        </div>
        {{--<footer id="footer">--}}
            {{--<div class="row-fluid">--}}
                {{--<div class="span3">--}}
                    {{--<p>--}}
                        {{--<a href="http://twitter.com/Bootply" rel="nofollow" title="Bootply on Twitter" target="ext">Twitter</a><br>--}}
                        {{--<a href="https://plus.google.com/+Bootply" rel="publisher">Google+</a><br>--}}
                        {{--<a href="http://facebook.com/Bootply" rel="nofollow" title="Bootply on Facebook" target="ext">Facebook</a><br>--}}
                        {{--<a href="https://github.com/iatek/bootply" title="Bootply on GitHub" target="ext">GitHub</a><br>--}}
                    {{--</p>--}}
                {{--</div>--}}
                {{--<div class="span3">--}}
                    {{--<p>--}}
                        {{--<a data-toggle="" role="button" href="">Contact Us</a><br>--}}
                        {{--<a href="/tags">Tags</a><br>--}}
                        {{--<a href="/bootstrap-community">Community</a><br>--}}
                        {{--<a href="/upgrade">Upgrade</a><br>--}}
                    {{--</p>--}}
                {{--</div>--}}
                {{--<div class="span3">--}}
                    {{--<p>--}}
                        {{--<a href="http://www.bootbundle.com" target="ext" rel="nofollow">BootBundle</a><br>--}}
                        {{--<a href="https://bootstrapbay.com/?ref=skelly" target="_ext" rel="nofollow"--}}
                           {{--title="Premium Bootstrap themes">Bootstrap Themes</a><br>--}}
                        {{--<a href="http://www.bootstrapzero.com" target="_ext" rel="nofollow"--}}
                           {{--title="Free Bootstrap templates">BootstrapZero</a><br>--}}
                        {{--<a href="http://upgrade-bootstrap.bootply.com/">2.x Upgrade Tool</a><br>--}}
                    {{--</p>--}}
                {{--</div>--}}
                {{--<div class="span3">--}}
                    {{--<span class="pull-right">©Copyright 2013-2014 <a href="/"--}}
                                                                     {{--title="The Bootstrap Playground">Bootply</a> | <a--}}
                                {{--href="/about#privacy">Privacy</a></span>--}}
                    {{--<a href="../js/tinymce/js/tinymce/plugins/responsive_filemanager/filemanager/dialog.php?type=2&field_id=fieldID4'&fldr=" class="btn iframe-btn" type="button">Open Filemanager</a>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</footer>--}}

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


@endsection

<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
{{--<script src="https://code.jquery.com/jquery-1.9.1.js"></script>--}}
<script src="https://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

<script>
    $(document).ready(function () {

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
            newdiv.innerHTML =  "<td><strong class=''>Asignatura:</strong></td> <td><br><input type='text' class='misDatos' name='asignatura[]'></td>";
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
        document.getElementById('boton').disabled = true;
        $('i').on('click',function () {
            $('#boton').removeClass('btn btn-info disabled');
            $('#boton').addClass('btn btn-success');
            document.getElementById('boton').disabled = false;


        })
        $('input').on('change',function () {
            $('#boton').removeClass('btn btn-info disabled');
            $('#boton').addClass('btn btn-success');
            document.getElementById('boton').disabled = false;


        })
        var tr = $('#clickable');

        $('#clickable').on('click', function () {


            $('#first_name').attr('readonly', false).focus().css("background-color", "#bfe1e847");
        });
        $('#clickable1').on('click', function () {
            $('#last_name').attr('readonly', false).focus().css("background-color", "#bfe1e847");
            ;


        });

        $('#clickable2').on('click', function () {

            $('#email').attr('readonly', false).focus().css("background-color", "#bfe1e847");
            ;
        });
        $('#clickable3').on('click', function () {

            $('#password').attr('readonly', false).focus().css("background-color", "#bfe1e847").val('');

            $('#password_confirmation').attr('readonly', false).css("background-color", "#bfe1e847");

        });
        var table=$('#asignaturas').DataTable({
            "scrollX": false,
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": false,
            "bInfo": false,
            "bAutoWidth": true,
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

            },
            "columnDefs": [ {
                "targets": 1,
                "searchable": true
            } ]
        });
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
        var sel = document.getElementById('disciplina');
        var opts = sel.options;


        for (var i=0;i<opts.length;i++) {
            opts[i].value = opts[i].text;
        }

        var x = document.getElementById("cursoSelect").selectedIndex;
        var curso=(document.getElementsByTagName("option")[x].value);
        $('#asignaturas').on('click', 'td a ', function (e) {
            e.preventDefault();
            var table = $('#asignaturas').DataTable();

            var data = table.row($(this).closest('tr')).data()
            var x = document.getElementById("cursoSelect").selectedIndex;
            var curso=(document.getElementsByTagName("option")[x].value);

            $.ajax({
                type:"get",
                url     : "{{ route('eliminarAsignatura') }}/"+data[1]+"/"+ data[0],
                encode  : true,
                data: {
                    asignatura: data[1],
                    year:data[0]
                },
                success: function(response){
                    window.location.href= "{{ route('misDatosAcademicos') }}"+"/"+curso;

                    console.log(response);

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });



        });
    });

    // function seleccionar() {
    //
    //     var table = $('#asignaturas').DataTable();
    //     var data = table.row($(this).closest('td')).data()
    //     alert(data['Curso']);
   // }

</script>
