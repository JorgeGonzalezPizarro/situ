@extends('layouts.layoutFront')
<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">

@section('content')
    <!-- Page Content -->
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="col-lg-12" style="    text-align: center;" id="">

                <div class="form-group">

            <div class="form-inline">

                <label for="orden">Ordenar Por :</label>
                <select onchange="orden(this.id)"  class="form-control"  id="orden">
                    <option value="fecha_inicio"><a onclick="orden(this.id)"   >Fecha Inicio</a></option>
                    <option onclick="orden(this.id)"  value="categoria_id">Categoria</option>
                    <option onclick="orden(this.id)"  value="titulo_hecho">Titulo</option>

                </select>
                    <label style="padding-left: 20px;" for="orden">Buscar por :</label>
                            <input type="text" id="buscar" onkeyup="buscar()" name="buscar" value=""class="form-control" placeholder="Buscar por...">
                            </select>
                            <span class="input-group-btn">
                </span>
                </div>
                </div>
            </div>
            @if(!empty($hechos))
            <div class="row" style="padding-top: 60px;">
                <input type="hidden" name="etiq" id="etiq" value="">
                <div class="col-lg-2">





                    <div class="card my-4">
                        <div class="panel panel-info" style="color: white;
    background: #003865;
    margin: 0px;
    text-align: center;margin:0px">
                            <div class="panel-body" style="padding: 10px;">
                                CATEGORÍAS
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="list-unstyled mb-0">
                                        @foreach ($categorias as $categ)
                                            <li style="padding: 5px">
                                    <span style="          width: 100%;
    min-width: 100px;
    line-height: 18px;
    font-size: 18px;
    min-height: 30px;
    background: #5BC0DE;
    padding: 5px;" class="badge badge-default">   <a href="#"  style=" font-weight: 200;   color: #f1f1f1;" onclick="categorias(this.id)" value="{{$categ->id}}" id="{{$categ->id}}">{{$categ->categoria}}</a></span>
                                            </li>
                                        @endforeach
                                        <li style="padding: 5px">
                                    <span style="          width: 100%;
    min-width: 100px;
    line-height: 18px;
    font-size: 18px;
    min-height: 30px;
    background: #5BC0DE;
    padding: 5px;" class="badge badge-default">     <a href="#"  style=" font-weight: 200;   color: #f1f1f1;"  onclick="etiquetas('')" id="etiqueta[]">TODAS</a></span>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            <div class="col-lg-8" id="contenedor" >
                <div class="dropdown" style="float: right ">

                </div>
            <div class="col-lg-12">
            </div> <div class="clearfix"></div>

                    @foreach($hechos as $hecho)

                    <div class="col-lg-12">
                <!-- Post Content Column -->

                    <!-- Title -->
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">


                                            <span style="float: left;">  <h3 class="timeline-title">{{$hecho->titulo_hecho}}</h3></span>
                                            <span style="float: right;">
                                                @if($user->inRole('Inv')|| $user->inRole('Prof'))   <?php $otros_datos=json_decode($alumno->otros_datos,true);?>

                                                <img style=" width: 50px;height: 50px; float: left;"  id="myimagen" title="profile image" src="{!! $otros_datos['img'] !!}" class="img-circle img-responsive" name="imagen">
                                                @else
                                                    <?php $otros_datos=json_decode($user->otros_datos,true);?>

                                                    <img style=" width: 50px;height: 50px; float: left;"  id="myimagen" title="profile image" src="{!! $otros_datos['img'] !!}" class="img-circle img-responsive"  name="imagen">
                                                    @endif<h4 style="text-align: center" class="timeline-title">{{$alumno->first_name}}</h4>
                                            </span>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title"><a href="#" id="{{$hecho->getCategoria()->get()->first()->id}}"onclick="categorias(this.id)"> {{$hecho->getCategoria()->get()->first()->categoria}}</a></h4>
                                                </div>

                                        <div class="timeline-body">

                                            <span class="pull-left"><small id="fecha_creacion"  class="text-muted fecha_creacion"><i class="glyphicon glyphicon-time"></i> Fecha creacion {{$hecho->created_at->formatLocalized('%d-%m-%Y')}}</small></span>

                                            <span class="pull-left" style=" width: -webkit-fill-available;
    word-wrap: break-word;">   {!!  str_limit($hecho->contenido,100,'...' )!!}</span>
                                            <div class="clearfix"></div>
                                            <span><p><a href=" {{ url('Situ/public') }}/{{$hecho->id}}/{{$hecho->getCategoria()->get()->first()->id}}" class="btn btn-info" role="button">Ver</a>
                                    </p></span>
                                        </div>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                            <span class="pull-right"><span class="text-muted fecha_inicio" style="font-style: italic;"><i class="glyphicon glyphicon-time"></i> Fecha de inicio {{Carbon\Carbon::parse($hecho->fecha_inicio)}}</span></span><br>
                                            @if(!empty($hecho->curso))
                                                <span class="pull-right"><span class="text-muted" style="font-style: italic;"><i class="fas fa-graduation-cap"></i> Curso <a  onclick="getCursos(this.text)" href="#"> {{substr($hecho->curso,0,3)}}</a></span></span><br>
                                                <span class="pull-right"><span class="text-muted" style="font-style: italic;"><i class="fas fa-book"></i> Asignatura <a href="#"  onclick="getAsignaturas(this.text)">{{substr($hecho->curso,5,10)}}</a></span></span><br>


                                            @endif
                                            @if(!empty($hecho->etiqueta))
                                                    <span class="pull-right"><span class="text-muted" style="font-style: italic;"></i>
                                                           <span style="          width: 100%;
    min-width: 100px;
    line-height: 18px;
    font-size: 18px;
    min-height: 30px;
    background: transparent;
        border: 1px solid #5bc0de;
    padding: 5px;" class="badge badge-default">    <a  onclick="etiquetas(this.text)" href="#"> {{str_replace(',',"",$hecho->etiqueta)}}</a></span></span></span>

                                            @endif
                                        </div>
                                    </div>
                                </li>


                            </ul>

                    </div>


        @endforeach
            </div>
            <div class="col-lg-2">



            <div class="card my-2">
                <div class="panel panel-info" style="color: white;
    background: #003865;
    margin: 0px;
    text-align: center;margin:0px">
                    <div class="panel-body" style="padding: 10px;">
                       ETIQUETAS
                    </div>
                </div>                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12" style="text-align: center">
                            <ul class="list-unstyled mb-0">
                                @foreach ($etiquetas as $etiq)
                                <li style="padding: 5px">
                                    <span style="          width: 100%;
    min-width: 100px;
    line-height: 18px;
    font-size: 18px;
    min-height: 30px;
    background: #5BC0DE;
    padding: 5px;" class="badge badge-default">   <a href="#" style=" font-weight: 200;   color: #f1f1f1;" onclick="etiquetas(this.text)" id="etiqueta[]">{{$etiq->nombre}}</a></span>
                                </li>
                                @endforeach
                                    <li style="padding: 5px">
                                     <span style="          width: 100%;
    min-width: 100px;
    line-height: 18px;
    font-size: 18px;
    min-height: 30px;
    background: #5BC0DE;
    padding: 5px;" class="badge badge-default"> <a href="#" style=" font-weight: 200;   color: #f1f1f1;"  onclick="etiquetas('')" id="etiqueta[]">TODAS</a></span>
                                    </li>
                            </ul>
                            <ul class="list-unstyled mb-0">
                                @foreach ($etiquetasAlu as $etiq1)
                                    <li style="padding: 5px">
                                    <span style="          width: 100%;
    min-width: 100px;
    line-height: 18px;
    font-size: 18px;
    min-height: 30px;
    background: #5BC0DE;
    padding: 5px;" class="badge badge-default">   <a href="#" style=" font-weight: 200;   color: #f1f1f1;" onclick="etiquetas(this.text)" id="etiqueta[]">{{$etiq1->nombre}}</a></span>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
                <div class="clearfix"></div>
                <hr>
                {{--<div class="card my-4">--}}
                    {{--<div class="panel panel-info" style="color: white;--}}
    {{--background: #003865;--}}
    {{--margin: 0px;--}}
    {{--text-align: center;margin:0px">--}}
                        {{--<div class="panel-body" style="padding: 10px;">--}}
                            {{--CATEGORÍAS--}}
                        {{--</div>--}}
                    {{--</div>--}}
                        {{--<div class="card-body">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-lg-12">--}}
                                {{--<ul class="list-unstyled mb-0">--}}
                                    {{--@foreach ($categorias as $categ)--}}
                                        {{--<li style="padding: 5px">--}}
                                    {{--<span style="          width: 100%;--}}
    {{--min-width: 100px;--}}
    {{--line-height: 18px;--}}
    {{--font-size: 18px;--}}
    {{--min-height: 30px;--}}
    {{--background: #5BC0DE;--}}
    {{--padding: 5px;" class="badge badge-default">   <a href="#"  style=" font-weight: 200;   color: #f1f1f1;" onclick="categorias(this.id)" value="{{$categ->id}}" id="{{$categ->id}}">{{$categ->categoria}}</a></span>--}}
                                        {{--</li>--}}
                                    {{--@endforeach--}}
                                        {{--<li style="padding: 5px">--}}
                                    {{--<span style="          width: 100%;--}}
    {{--min-width: 100px;--}}
    {{--line-height: 18px;--}}
    {{--font-size: 18px;--}}
    {{--min-height: 30px;--}}
    {{--background: #5BC0DE;--}}
    {{--padding: 5px;" class="badge badge-default">     <a href="#"  style=" font-weight: 200;   color: #f1f1f1;"  onclick="etiquetas('')" id="etiqueta[]">TODAS</a></span>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                @else
                    <div class="clearfix"></div>
                    <div class="container" style="margin-top: 50px">
                        <ul class="list-group">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-heading">
                                <p><small class="text-muted"> </small></p>
                            </div>
    @if($user->inRole('Alu'))
   <div class="timeline-body">
       <div class="alert alert-warning">Comienza añadiendo tu trayectoria universitaria y profesional a  a la plataforma !
       <ul style="list-style-type: none;">

               @foreach($categorias as $categoria)
                   <li class="" style="    padding: 10px;
color: #003865;">
                       <a href="{{ route('hechos', ['categoria'=>$categoria->categoria])}}" style="    color: #003865;">
                           <i class="fas fa-plus-square"></i>
                           {{$categoria->categoria}}</a>
                   </li>
               @endforeach
       </ul>
       </div>


   </div>
        @endif
                            @if($user->inRole('Inv'))
                                <div class="timeline-body">
                                    <div class="alert alert-warning">El alumno no ha añadido ningun hecho a la plataforma !

                                    </div>


                                </div>
                            @endif
</li>


</ul>
</ul>    </div>

@endif


</div>
</div>
</div>
</div>



@endsection

<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

<script>




$(document).ready(function() {
    var elements = document.getElementsByClassName("fecha_creacion");
    for(var i=0; i<elements.length; i++) {

        document.getElementsByClassName("fecha_creacion")[i].textContent=" Fecha creacion "+ (new Date(document.getElementsByClassName("fecha_creacion")[i].textContent)).toLocaleDateString("es-ES");

    }
    var elements = document.getElementsByClassName("fecha_inicio");
    for(var i=0; i<elements.length; i++) {

        document.getElementsByClassName("fecha_inicio")[i].textContent=" Fecha de Inicio "+ (new Date(document.getElementsByClassName("fecha_creacion")[i].textContent)).toLocaleDateString("es-ES");

    }
    // elements.forEach(function (e) {
    //     alert(new Date(e.text()));
    //
    // });
var string = "#"
if((window.location.href).includes(string)) {
var pathArray = window.location.href.split('#');
var newPathname = "";

for (i = 0; i < pathArray.length; i++) {
// newPathname += "#";
// newPathname += pathArray[i];
}
if (pathArray[1].length > 0) {
etiquetas(pathArray[1]);
}
}

});

function orden(id) {

var ordenacion = document.getElementById("orden");

var orden = ordenacion.options[ordenacion.selectedIndex].value;

if (0 != ($('#buscar').val().length)) {
var input = $('#buscar').val();
} else if (0 != ($('#etiq').val().length)) {
var input = $('#etiq').val();

} else {
input = "";
}

// var x = document.getElementById("cursoSelect").selectedIndex;

if (0 != (orden.length)) {
$.ajax({
type: "get",
url: "{{url('Situ') }}" + "/" + orden,
encode: true,
data: {
orden: orden,
input: $('#etiq').val(),
},
success: function (response) {
console.log(response[0].length);
console.log();
if (response[0].length == 0) {

var html2 = '<div class="alert alert-info" role="alert">' +
   ' No hay hechos relacionados con  <a href="#" class="alert-link" style="font-size: 18px;">' + id + '</a>.' +
   ' </div>';
$("#contenedor").empty();

$("#contenedor").append(html2);

}


else {

var html = [];
response[0].forEach(function (element) {


   html.push('<div class="col-lg-12">'
       +'<ul class="timeline">' +
       '<li>' +
       '  <div class="timeline-panel">' +
       '    <div class="timeline-heading">' +
       '  <span style="float: left;"><h3 class="timeline-title">' + element['titulo_hecho'] + '</h3></span>' +
       '<span style="float: right;">'+

       '<img style=" width: 50px;height: 50px; float: left;"  id="myimagen" title="profile image" src="' + response[1]['img'] + '" class="img-circle img-responsive"  name="imagen">' +
       '<h4 style="text-align: center" class="timeline-title">'+response[2]['first_name']+'</h4></span><div class="clearfix"></div></div>' +
       '<div class="col-md-8"><div class="timeline-panel"><div class="timeline-heading">' +
       '<h4 class="timeline-title"><a href="#" id=" ' + element['categoria_id']+ '" onclick="categorias(this.id)">'+ element['categoria_nombre']+'</a></h5>' +
       '</div><input type="hidden" name="etiq" id="etiq" value=' + input + '>' +

   '</div>' +
   '<div class="timeline-body">' +
   '  <span class="pull-left"><small class="text-muted fecha_creacion"><i class="glyphicon glyphicon-time"></i> Fecha creacion ' + element['created_at'] + '</small></span>' +
   '<br>' +

   '  <div class="clearfix"></div>' +

   '<span class="pull-left"style=" width: -webkit-fill-available;' +
   '    word-wrap: break-word;"> ' + element['contenido'].substring(0, 100) + '...' + '</span>' +
   '  <div class="clearfix"></div>' +
   ' <span><p><a href=" {{ url('Situ/public') }}/' + element['id'] + '/' + element['categoria_id'] + '" class="btn btn-info" role="button">Ver</a>' +
   ' </p></span>' +
   '</div>' +
   '</div>'
   +'<div class="col-md-4">'
  + '<span class="pull-right"><span class="text-muted fecha_inicio" style="font-style: italic;"><i class="glyphicon glyphicon-time"></i>Fecha de inicio'+  element['fecha_inicio'] + '</span></span><br>'
       + (element['curso'] !==(null ) ? '<span class="pull-right"><span class="text-muted" style="font-style: italic;"><i class="fas fa-book"></i> Curso <a href="#"  onclick="getAsignaturas(this.text)">' + element['curso'].substring(0, 3) + '</a></span></span> <br><span class="pull-right"><span class="text-muted" style="font-style: italic;"><i class="fas fa-book"></i> Asignatura <a href="#"  onclick="getAsignaturas(this.text)">' + element['curso'].substring(5, 100) + '</a></span></span><br> ' : ' ' )

   +'<span class="pull-right"><span class="text-muted" style="font-style: italic;"></i>'+
        (element['etiqueta'] !==(null ) ?  '<span style="  width: 100%;min-width: 100px; line-height: 18px;font-size: 18px;min-height: 30px;background: transparent;  border: 1px solid #5bc0de;  padding: 5px;" class="badge badge-default">    <a  onclick="etiquetas(this.text)" href="#">'+ (element['etiqueta']).replace(',','')+'</a></span></span></span>' : ' ' )



   +'</div>'

   +'</div>'
   +'</li>' +


   '</ul>' +

   '</div>');
   $("#contenedor").empty();


});
html.forEach(function (element) {

   $("#contenedor").append(element);


});
    var elements = document.getElementsByClassName("fecha_creacion");
    for(var i=0; i<elements.length; i++) {

        document.getElementsByClassName("fecha_creacion")[i].textContent=" Fecha creacion "+ (new Date(document.getElementsByClassName("fecha_creacion")[i].textContent)).toLocaleDateString("es-ES");

    }
    var elements = document.getElementsByClassName("fecha_inicio");
    for(var i=0; i<elements.length; i++) {

        document.getElementsByClassName("fecha_inicio")[i].textContent=" Fecha de Inicio "+ (new Date(document.getElementsByClassName("fecha_inicio")[i].textContent)).toLocaleDateString("es-ES");

    }
}


},
error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
console.log(JSON.stringify(jqXHR));
console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
}
});
} else {
location.reload();
}


}




function etiquetas(id){


var ordenacion = document.getElementById("orden");

var orden=ordenacion.options[ordenacion.selectedIndex].value;


// var x = document.getElementById("cursoSelect").selectedIndex;
console.log(id);

if(0 !=(id.length)) {
$.ajax({
type: "get",
url: "{{url('Situ/') }}" + "/" +id,
encode: true,
data: {
input: id,
orden: orden,
},
success: function (response) {
console.log(response[0].length);

if (response[0].length == 0) {

var html2= '<div class="alert alert-info" role="alert">'+
' No hay hechos relacionados con  <a href="#" class="alert-link" style="font-size: 18px;">' +id+'</a>.'+
' </div>';
$("#contenedor").empty();

$("#contenedor").append(html2);

}


else {


var html = [];
response[0].forEach(function (element) {


html.push('<div class="col-lg-12">'
   +'<ul class="timeline">' +
   '<li>' +
   '  <div class="timeline-panel">' +
   '    <div class="timeline-heading">' +
   '  <span style="float: left;"><h3 class="timeline-title">' + element['titulo_hecho'] + '</h3></span>' +
   '<span style="float: right;">'+

   '<img style=" width: 50px;height: 50px; float: left;"  id="myimagen" title="profile image" src="' + response[1]['img'] + '" class="img-circle img-responsive"  name="imagen">' +
   '<h4 style="text-align: center" class="timeline-title">'+response[2]['first_name']+'</h4></span><div class="clearfix"></div></div>' +
   '<div class="col-md-8"><div class="timeline-panel"><div class="timeline-heading">' +
   '<h4 class="timeline-title"><a href="#" id="' + element['categoria_id']+ '"onclick="categorias(this.id)">'+ element['categoria_nombre']+'</a></h5>' +
   '</div><input type="hidden" name="etiq" id="etiq" value=' + id + '>' +

   '</div>' +
   '<div class="timeline-body">' +
   '  <span class="pull-left"><small class="text-muted fecha_creacion"><i class="glyphicon glyphicon-time"></i> Fecha creacion ' + element['created_at'] + '</small></span>' +
   '<br>' +

   '  <div class="clearfix"></div>' +

   '<span class="pull-left"style=" width: -webkit-fill-available;' +
   '    word-wrap: break-word;"> ' + element['contenido'].substring(0, 100) + '...' + '</span>' +
   '  <div class="clearfix"></div>' +
   ' <span><p><a href=" {{ url('Situ/public') }}/' + element['id'] + '/' + element['categoria_id'] + '" class="btn btn-info" role="button">Ver</a>' +
   ' </p></span>' +
   '</div>' +
   '</div>'
   +'<div class="col-md-4">'
    + '<span class="pull-right"><span class="text-muted fecha_inicio" style="font-style: italic;"><i class="glyphicon glyphicon-time"></i>Fecha de inicio'+  new Date(element['fecha_inicio']) + '</span></span><br>'
   + (element['curso'] !==(null ) ? '<span class="pull-right"><span class="text-muted" style="font-style: italic;"><i class="fas fa-book"></i> Curso <a href="#"  onclick="getAsignaturas(this.text)">' + element['curso'].substring(0, 3) + '</a></span></span> <br><span class="pull-right"><span class="text-muted" style="font-style: italic;"><i class="fas fa-book"></i> Asignatura <a href="#"  onclick="getAsignaturas(this.text)">' + element['curso'].substring(5, 100) + '</a></span></span><br> ' : ' ' )

   +'<span class="pull-right"><span class="text-muted" style="font-style: italic;"></i>'+
   (element['etiqueta'] !=(null || "") ?  '<span style="  width: 100%;min-width: 100px; line-height: 18px;font-size: 18px;min-height: 30px;background: transparent;  border: 1px solid #5bc0de;  padding: 5px;" class="badge badge-default">    <a  onclick="etiquetas(this.text)" href="#">'+ (element['etiqueta']).replace(',','')+'</a></span></span></span>' : ' ' )



   +'</div>'

   +'</div>'
   +'</li>' +


   '</ul>' +

   '</div>');
$("#contenedor").empty();


});

html.forEach(function (element) {
console.log(element['id']);

$("#contenedor").append(element);


});
    var elements = document.getElementsByClassName("fecha_creacion");
    for(var i=0; i<elements.length; i++) {

        document.getElementsByClassName("fecha_creacion")[i].textContent=" Fecha creacion "+ (new Date(document.getElementsByClassName("fecha_creacion")[i].textContent)).toLocaleDateString("es-ES");

    }
    var elements = document.getElementsByClassName("fecha_inicio");
    for(var i=0; i<elements.length; i++) {

        document.getElementsByClassName("fecha_inicio")[i].textContent=" Fecha de Inicio "+ (new Date(document.getElementsByClassName("fecha_inicio")[i].textContent)).toLocaleDateString("es-ES");

    }
var input = document.getElementById("buscar");
input_value =  input.getAttribute("value");
input_value = "";
$('#buscar').val("");
$('#etiq').val(id);

}


},
error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
console.log(JSON.stringify(jqXHR));
console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
}
});
}else{
location.reload();
}

}


function categorias(id){

var ordenacion = document.getElementById("orden");

var orden=ordenacion.options[ordenacion.selectedIndex].value;


// var x = document.getElementById("cursoSelect").selectedIndex;
console.log(id);

if(0 !=(id.length)) {
$.ajax({
type: "get",
url: "{{url('Situ/categorias') }}" + "/" +id,
encode: true,
data: {
input: id,
orden: orden,
},
success: function (response) {
console.log(response[0].length);

if (response[0].length == 0) {

var html2= '<div class="alert alert-info" role="alert">'+
   ' No hay hechos relacionados la busqueda '+
   ' </div>';
$("#contenedor").empty();

$("#contenedor").append(html2);

}


else {


var html = [];
response[0].forEach(function (element) {


   html.push('<div class="col-lg-12">'
       +'<ul class="timeline">' +
       '<li>' +
       '  <div class="timeline-panel">' +
       '    <div class="timeline-heading">' +
       '  <span style="float: left;"><h3 class="timeline-title">' + element['titulo_hecho'] + '</h3></span>' +

       '<span style="float: right;">'+

       '<img style=" width: 50px;height: 50px; float: left;"  id="myimagen" title="profile image" src="' + response[1]['img'] + '" class="img-circle img-responsive"  name="imagen">' +
       '<h4 style="text-align: center" class="timeline-title">'+response[2]['first_name']+'</h4></span><div class="clearfix"></div></div>' +
       '<div class="col-md-8"><div class="timeline-panel"><div class="timeline-heading">' +
       '<h4 class="timeline-title"><a href="#" id="' + element['categoria_id'] + '" onclick="categorias(this.id)">'+ element['categoria_nombre']+'</a></h5>' +
       '</div><input type="hidden" name="etiq" id="etiq" value=' + input + '>' +

       '</div>' +
       '<div class="timeline-body">' +
       '  <span class="pull-left"><small class="text-muted fecha_creacion"><i class="glyphicon glyphicon-time"></i> Fecha creacion ' + element['created_at'] + '</small></span>' +
       '<br>' +

       '  <div class="clearfix"></div>' +

       '<span class="pull-left"style=" width: -webkit-fill-available;' +
       '    word-wrap: break-word;"> ' + element['contenido'].substring(0, 100) + '...' + '</span>' +
       '  <div class="clearfix"></div>' +
       ' <span><p><a href=" {{ url('Situ/public') }}/' + element['id'] + '/' + element['categoria_id'] + '" class="btn btn-info" role="button">Ver</a>' +
       ' </p></span>' +
       '</div>' +
       '</div>'
       +'<div class="col-md-4">'
       + '<span class="pull-right"><span class="text-muted fecha_inicio" style="font-style: italic;"><i class="glyphicon glyphicon-time"></i>Fecha de inicio'+  new Date(element['fecha_inicio']) + '</span></span><br>'
       + (element['curso'] !==(null ) ? '<span class="pull-right"><span class="text-muted" style="font-style: italic;"><i class="fas fa-book"></i> Curso <a href="#"  onclick="getAsignaturas(this.text)">' + element['curso'].substring(0, 3) + '</a></span></span> <br><span class="pull-right"><span class="text-muted" style="font-style: italic;"><i class="fas fa-book"></i> Asignatura <a href="#"  onclick="getAsignaturas(this.text)">' + element['curso'].substring(5, 100) + '</a></span></span><br> ' : ' ' )

       +'<span class="pull-right"><span class="text-muted" style="font-style: italic;"></i>'+
       (element['etiqueta'] !=(null ) ?  '<span style="  width: 100%;min-width: 100px; line-height: 18px;font-size: 18px;min-height: 30px;background: transparent;  border: 1px solid #5bc0de;  padding: 5px;" class="badge badge-default">    <a  onclick="etiquetas(this.text)" href="#">'+ (element['etiqueta']).replace(',','')+'</a></span></span></span>' : ' ' )



       +'</div>'

       +'</div>'
       +'</li>' +


       '</ul>' +

       '</div>');

   $("#contenedor").empty();


});

var input = document.getElementById("buscar");

$('#etiq').val(id);

console.log(response[0].length);
html.forEach(function (element) {
   console.log(element['id']);

   $("#contenedor").append(element);


});
    var elements = document.getElementsByClassName("fecha_creacion");
    for(var i=0; i<elements.length; i++) {

        document.getElementsByClassName("fecha_creacion")[i].textContent=" Fecha creacion "+ (new Date(document.getElementsByClassName("fecha_creacion")[i].textContent)).toLocaleDateString("es-ES");

    }  var elements = document.getElementsByClassName("fecha_inicio");
    for(var i=0; i<elements.length; i++) {

        document.getElementsByClassName("fecha_inicio")[i].textContent=" Fecha de Inicio "+ (new Date(document.getElementsByClassName("fecha_inicio")[i].textContent)).toLocaleDateString("es-ES");

    }

}


},
error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
console.log(JSON.stringify(jqXHR));
console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
}
});
}else{
location.reload();
}

}


function buscar() {

var ordenacion = document.getElementById("orden");

var orden=ordenacion.options[ordenacion.selectedIndex].value;

var buscar = document.getElementById("buscar");

// var x = document.getElementById("cursoSelect").selectedIndex;
console.log($('#buscar').val());

if(0 !=($('#buscar').val().length)) {
$.ajax({
type: "get",
url: "{{url('Situ/') }}" + "/" + $('#buscar').val(),
encode: true,
data: {
input: $('#buscar').val(),
orden:orden,
},
success: function (response) {
console.log(response[0].length);

if (response[0].length == 0) {

   var html2= '<div class="alert alert-info" role="alert">'+
       ' No hay hechos relacionados con  <a href="#" class="alert-link" style="font-size: 18px;">' +$("#buscar").val()+'</a>.'+
       ' </div>';
   $("#contenedor").empty();

   $("#contenedor").append(html2);

}


else {


   var html = [];
   response[0].forEach(function (element) {



       html.push('<div class="col-lg-12">'
           +'<ul class="timeline">' +
           '<li>' +
           '  <div class="timeline-panel">' +
           '    <div class="timeline-heading">' +
           '  <span style="float: left;"><h3 class="timeline-title">' + element['titulo_hecho'] + '</h3></span>' +

           '<span style="float: right;">'+

           '<img style=" width: 50px;height: 50px; float: left;"  id="myimagen" title="profile image" src="' + response[1]['img'] + '" class="img-circle img-responsive"  name="imagen">' +
           '<h4 style="text-align: center" class="timeline-title">'+response[2]['first_name']+'</h4></span><div class="clearfix"></div></div>' +
           '<div class="col-md-8"><div class="timeline-panel"><div class="timeline-heading">' +
           '<h4 class="timeline-title"><a href="#" id="' + element['categoria_id'] + '"onclick="categorias(this.id)">'+ element['categoria_nombre']+'</a></h5>' +
           '</div>'+

           '</div>' +
           '<div class="timeline-body">' +
           '  <span class="pull-left"><small class="text-muted fecha_creacion"><i class="glyphicon glyphicon-time"></i> Fecha creacion ' + element['created_at'] + '</small></span>' +
           '<br>' +

           '  <div class="clearfix"></div>' +

           '<span class="pull-left"style=" width: -webkit-fill-available;' +
           '    word-wrap: break-word;"> ' + element['contenido'].substring(0, 100) + '...' + '</span>' +
           '  <div class="clearfix"></div>' +
           ' <span><p><a href=" {{ url('Situ/public') }}/' + element['id'] + '/' + element['categoria_id'] + '" class="btn btn-info" role="button">Ver</a>' +
           ' </p></span>' +
           '</div>' +
           '</div>'
           +'<div class="col-md-4">'
           + '<span class="pull-right"><span class="text-muted fecha_inicio" style="font-style: italic;"><i class="glyphicon glyphicon-time"></i>Fecha de inicio'+  new Date(element['fecha_inicio']) + '</span></span><br>'
           + (element['curso'] !==(null ) ? '<span class="pull-right"><span class="text-muted" style="font-style: italic;"><i class="fas fa-book"></i> Curso <a href="#"  onclick="getAsignaturas(this.text)">' + element['curso'].substring(0, 3) + '</a></span></span> <br><span class="pull-right"><span class="text-muted" style="font-style: italic;"><i class="fas fa-book"></i> Asignatura <a href="#"  onclick="getAsignaturas(this.text)">' + element['curso'].substring(5, 100) + '</a></span></span><br> ' : ' ' )

           +'<span class="pull-right"><span class="text-muted" style="font-style: italic;"></i>'+
           (element['etiqueta']!==(null ) ?  '<span style="  width: 100%;min-width: 100px; line-height: 18px;font-size: 18px;min-height: 30px;background: transparent;  border: 1px solid #5bc0de;  padding: 5px;" class="badge badge-default">    <a  onclick="etiquetas(this.text)" href="#">'+ (element['etiqueta']).replace(',','')+'</a></span></span></span>' : ' ' )



           +'</div>'

           +'</div>'
           +'</li>' +


           '</ul>' +

           '</div>');

       $("#contenedor").empty();


   });

   html.forEach(function (element) {
       console.log(element['id']);

       $("#contenedor").append(element);


   });
   // $('#etiq').val(id);
    var elements = document.getElementsByClassName("fecha_creacion");
    for(var i=0; i<elements.length; i++) {

        document.getElementsByClassName("fecha_creacion")[i].textContent=" Fecha creacion "+ (new Date(document.getElementsByClassName("fecha_creacion")[i].textContent)).toLocaleDateString("es-ES");

    }  var elements = document.getElementsByClassName("fecha_inicio");
    for(var i=0; i<elements.length; i++) {

        document.getElementsByClassName("fecha_inicio")[i].textContent=" Fecha de Inicio "+ (new Date(document.getElementsByClassName("fecha_inicio")[i].textContent)).toLocaleDateString("es-ES");

    }
   console.log(response[0].length);

}


},
error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
console.log(JSON.stringify(jqXHR));
console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
}
});
}else{
location.reload();
}
}

function getCursos(id){


var ordenacion = document.getElementById("orden");

var orden=ordenacion.options[ordenacion.selectedIndex].value;


// var x = document.getElementById("cursoSelect").selectedIndex;
console.log(id);

if(0 !=(id.length)) {
$.ajax({
type: "get",
url: "{{url('/cursos') }}" + "/" +id,
encode: true,
data: {
input: id,
orden: orden,
},
success: function (response) {
console.log(response[0].length);

if (response[0].length == 0) {

var html2= '<div class="alert alert-info" role="alert">'+
   ' No hay hechos relacionados con  <a href="#" class="alert-link" style="font-size: 18px;">' +id+'</a>.'+
   ' </div>';
$("#contenedor").empty();

$("#contenedor").append(html2);

}


else {


var html = [];
response[0].forEach(function (element) {


   html.push('<div class="col-lg-12">'
       +'<ul class="timeline">' +
       '<li>' +
       '  <div class="timeline-panel">' +
       '    <div class="timeline-heading">' +
       '  <span style="float: left;"><h3 class="timeline-title">' + element['titulo_hecho'] + '</h3></span>' +

       '<span style="float: right;">'+

       '<img style=" width: 50px;height: 50px; float: left;"  id="myimagen" title="profile image" src="' + response[1]['img'] + '" class="img-circle img-responsive"  name="imagen">' +
       '<h4 style="text-align: center" class="timeline-title">'+response[2]['first_name']+'</h4></span><div class="clearfix"></div></div>' +
       '<div class="col-md-8"><div class="timeline-panel"><div class="timeline-heading">' +
       '<h4 class="timeline-title"><a href="#" id="' + element['categoria_id'] + '"onclick="categorias(this.id)">'+ element['categoria_nombre']+'</a></h5>' +
       '</div>'+

       '</div>' +
       '<div class="timeline-body">' +
       '  <span class="pull-left"><small class="text-muted fecha_creacion"><i class="glyphicon glyphicon-time"></i> Fecha creacion ' + element['created_at'] + '</small></span>' +
       '<br>' +

       '  <div class="clearfix"></div>' +

       '<span class="pull-left"style=" width: -webkit-fill-available;' +
       '    word-wrap: break-word;"> ' + element['contenido'].substring(0, 100) + '...' + '</span>' +
       '  <div class="clearfix"></div>' +
       ' <span><p><a href=" {{ url('Situ/public') }}/' + element['id'] + '/' + element['categoria_id'] + '" class="btn btn-info" role="button">Ver</a>' +
       ' </p></span>' +
       '</div>' +
       '</div>'
       +'<div class="col-md-4">'
       + '<span class="pull-right"><span class="text-muted fecha_inicio" style="font-style: italic;"><i class="glyphicon glyphicon-time"></i>Fecha de inicio'+  new Date(element['fecha_inicio']) + '</span></span><br>'
       + (element['curso'] !==(null ) ? '<span class="pull-right"><span class="text-muted" style="font-style: italic;"><i class="fas fa-book"></i> Curso <a href="#"  onclick="getAsignaturas(this.text)">' + element['curso'].substring(0, 3) + '</a></span></span> <br><span class="pull-right"><span class="text-muted" style="font-style: italic;"><i class="fas fa-book"></i> Asignatura <a href="#"  onclick="getAsignaturas(this.text)">' + element['curso'].substring(5, 100) + '</a></span></span><br> ' : ' ' )

       +'<span class="pull-right"><span class="text-muted" style="font-style: italic;"></i>'+
       (element['etiqueta'] !==(null ) ?  '<span style="  width: 100%;min-width: 100px; line-height: 18px;font-size: 18px;min-height: 30px;background: transparent;  border: 1px solid #5bc0de;  padding: 5px;" class="badge badge-default">    <a  onclick="etiquetas(this.text)" href="#">'+ (element['etiqueta']).replace(',','')+'</a></span></span></span>' : ' ' )



       +'</div>'

       +'</div>'
       +'</li>' +


       '</ul>' +

       '</div>');
   $("#contenedor").empty();


});

html.forEach(function (element) {
   console.log(element['id']);

   $("#contenedor").append(element);


});
    var elements = document.getElementsByClassName("fecha_creacion");
    for(var i=0; i<elements.length; i++) {

        document.getElementsByClassName("fecha_creacion")[i].textContent=" Fecha creacion "+ (new Date(document.getElementsByClassName("fecha_creacion")[i].textContent)).toLocaleDateString("es-ES");

    }
    var elements = document.getElementsByClassName("fecha_inicio");
    for(var i=0; i<elements.length; i++) {

        document.getElementsByClassName("fecha_inicio")[i].textContent=" Fecha de Inicio "+ (new Date(document.getElementsByClassName("fecha_inicio")[i].textContent)).toLocaleDateString("es-ES");

    }
var input = document.getElementById("buscar");
input_value =  input.getAttribute("value");
input_value = "";
$('#etiq').val(id);

}


},
error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
console.log(JSON.stringify(jqXHR));
console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
}
});
}else{
location.reload();
}

}
function getAsignaturas(id){


var ordenacion = document.getElementById("orden");

var orden=ordenacion.options[ordenacion.selectedIndex].value;


// var x = document.getElementById("cursoSelect").selectedIndex;
console.log(id);

if(0 !=(id.length)) {
$.ajax({
type: "get",
url: "{{url('/cursos') }}" + "/" +id,
encode: true,
data: {
input: id,
orden: orden,
},
success: function (response) {
console.log(response[0].length);

if (response[0].length == 0) {

var html2= '<div class="alert alert-info" role="alert">'+
   ' No hay hechos relacionados con  <a href="#" class="alert-link" style="font-size: 18px;">' +id+'</a>.'+
   ' </div>';
$("#contenedor").empty();

$("#contenedor").append(html2);

}


else {


var html = [];
response[0].forEach(function (element) {


   html.push('<div class="col-lg-12">'
       +'<ul class="timeline">' +
       '<li>' +
       '  <div class="timeline-panel">' +
       '    <div class="timeline-heading">' +
       '  <span style="float: left;"><h3 class="timeline-title">' + element['titulo_hecho'] + '</h3></span>' +

       '<span style="float: right;">'+

       '<img style=" width: 50px;height: 50px; float: left;"  id="myimagen" title="profile image" src="' + response[1]['img'] + '" class="img-circle img-responsive"  name="imagen">' +
       '<h4 style="text-align: center" class="timeline-title">'+response[2]['first_name']+'</h4></span><div class="clearfix"></div></div>' +
       '<div class="col-md-8"><div class="timeline-panel"><div class="timeline-heading">' +
       '<h4 class="timeline-title"><a href="#" id="' + element['categoria_id'] + '"onclick="categorias(this.id)">'+ element['categoria_nombre']+'</a></h5>' +
       '</div>' +

       '</div>' +
       '<div class="timeline-body">' +
       '  <span class="pull-left"><small class="text-muted fecha_creacion"><i class="glyphicon glyphicon-time"></i> Fecha creacion ' + element['created_at'] + '</small></span>' +
       '<br>' +

       '  <div class="clearfix"></div>' +

       '<span class="pull-left"style=" width: -webkit-fill-available;' +
       '    word-wrap: break-word;"> ' + element['contenido'].substring(0, 100) + '...' + '</span>' +
       '  <div class="clearfix"></div>' +
       ' <span><p><a href=" {{ url('Situ/public') }}/' + element['id'] + '/' + element['categoria_id'] + '" class="btn btn-info" role="button">Ver</a>' +
       ' </p></span>' +
       '</div>' +
       '</div>'
       +'<div class="col-md-4">'
       + '<span class="pull-right"><span class="text-muted fecha_inicio" style="font-style: italic;"><i class="glyphicon glyphicon-time"></i>Fecha de inicio'+  new Date(element['fecha_inicio']) + '</span></span><br>'
       + (element['curso']!==(null ) ? '<span class="pull-right"><span class="text-muted" style="font-style: italic;"><i class="fas fa-book"></i> Curso <a href="#"  onclick="getAsignaturas(this.text)">' + element['curso'].substring(0, 3) + '</a></span></span> <br><span class="pull-right"><span class="text-muted" style="font-style: italic;"><i class="fas fa-book"></i> Asignatura <a href="#"  onclick="getAsignaturas(this.text)">' + element['curso'].substring(5, 100) + '</a></span></span><br> ' : ' ' )

       +'<span class="pull-right"><span class="text-muted" style="font-style: italic;"></i>'+
       (element['etiqueta'] !==(null ) ?  '<span style="  width: 100%;min-width: 100px; line-height: 18px;font-size: 18px;min-height: 30px;background: transparent;  border: 1px solid #5bc0de;  padding: 5px;" class="badge badge-default">    <a  onclick="etiquetas(this.text)" href="#">'+ (element['etiqueta']).replace(',','')+'</a></span></span></span>' : ' ' )



       +'</div>'

       +'</div>'
       +'</li>' +


       '</ul>' +

       '</div>');

   $("#contenedor").empty();


});

html.forEach(function (element) {
   console.log(element['id']);

   $("#contenedor").append(element);


});
    var elements = document.getElementsByClassName("fecha_creacion");
    for(var i=0; i<elements.length; i++) {

        document.getElementsByClassName("fecha_creacion")[i].textContent=" Fecha creacion "+ (new Date(document.getElementsByClassName("fecha_creacion")[i].textContent)).toLocaleDateString("es-ES");

    }
    var elements = document.getElementsByClassName("fecha_inicio");
    for(var i=0; i<elements.length; i++) {

        document.getElementsByClassName("fecha_inicio")[i].textContent=" Fecha de Inicio "+ (new Date(document.getElementsByClassName("fecha_inicio")[i].textContent)).toLocaleDateString("es-ES");

    }
var input = document.getElementById("buscar");
input_value =  input.getAttribute("value");
input_value = "";
$('#etiq').val(id);

}


},
error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
console.log(JSON.stringify(jqXHR));
console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
}
});
}else{
location.reload();
}

}
</script>