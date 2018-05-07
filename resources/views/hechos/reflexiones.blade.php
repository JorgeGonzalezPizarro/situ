@extends('layouts.layoutAdmin')
<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">


<!-- Latest compiled and minified JavaScript -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>--}}

{{--<!-- (Optional) Latest compiled and minified JavaScript translation files -->--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>--}}

<style>.form-control:focus  {
        border-color: #003865 !important;    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgb(0, 56, 101);

    }</style>
@section('content')




    <div class="container target">


        <h1 class="" style="display: none;">{{ $user->first_name  }}</h1>

        <h1 class="" id="categoria"style="display: none;">{!! $categoria->categoria !!}</h1>
        <br>
        <br>




        <div class="row">
            {{ Form::open(array('route' => 'guardarHecho', 'class' => 'form-style-8','files' => true)) }}

            <input type="hidden" value="{{count($hechos)}}" id="count">

            <div class="col-sm-12" style="" contenteditable="false">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad">


                    <nav class="navbar navbar" style="padding: 10px">
                        <div class="collapse navbar-collapse" id="navbarColor03">

                        </div>
                        <div class="form-inline" >
                            <div class="alert alert-info">¿ Te gustaría vincular tu reflexión a algun hecho ?<br><br>
                                <input type="radio"  name="hecho_relacionado" value="Personal" checked><span id="vinculado" style="    font-size: 20px;
    font-family: serif;
    font-stretch: semi-condensed;"> Reflexión Personal </span><br>
                                <br><br>
                                <input type="radio"  name="hecho_relacionado" id="vincular" value="vincular" > <span id="vinculado" style="    font-size: 20px;
    font-family: serif;
    font-stretch: semi-condensed;"> Vincular </span><br><br>
                            </div>
                        </div>
                        <div id="seleccionarHecho">
                        <div class="col-md-11" >
                            <select id="selectorHecho" class="form-control">
                                <option value="" disabled selected>Vincula un hecho a tu reflexión</option>
                                @foreach($hechos as $hecho)
                                    <option  id="{{$hecho->categoria_id}}" value="{{ $hecho->id }}">{{ $hecho->categoria_nombre ." - "  .$hecho->curso . " - " . $hecho->titulo_hecho }} </option>


                                @endforeach
                            </select>
                        </div>
                            <div class="col-md-1" style="">

                                {!! Form::button('Ver Hecho', array('class'=>'btn btn-info ' ,'id'=>'verHecho' , 'style=""')) !!}</td>

                                <hr>

                            </div>
                        </div>
                            <div class="col-md-11" style="">

                                {!! Form::textarea('contenido', Input::old('contenido') , ['id'=>'contenido','placeholder'=>'Reflexion...','style'=>'    margin-top: 0px; margin-bottom: 0px;width: 100%;height: 70px;']) !!}

                                <br>
                                <br>

                                <span>{!! Form::select('etiqueta', $etiqueta, null, ['id'=>'etiquetas','class' => 'form-control chosen-select', 'name' => 'etiqueta[]', 'multiple tabindex' => 6]) !!}
                                </span>
                            </div>
                        <div class="col-md-1" style="">



                            {!! Form::button('Guardar', array('class'=>'btn btn-info ' ,'id'=>'fraseButton' , 'style="margin-top:95px;"')) !!}</td>

                        </div>
                    </nav>

                    @if(count($reflexiones)>0)
                        <div class="panel-body">

                            <div class="row">

                                @foreach($reflexiones as $reflexion )
                                    <ul class="timeline">
                                        <li>
                                            <blockquote class="quote-card" style="padding-left: 100px;">
                                                @if(!empty($reflexion->hechos_relacionados))
                                                <p>Reflexion sobre...
                                                {!! Form::button('Ver Hecho', array('class'=>'btn btn-link' , 'onclick'=>'location.href = "'.url('Situ/public/'.$reflexion->hechos_relacionados.'/'.$reflexion->hechos_relacionados_cat.'').'"', 'id'=>$reflexion->hechos_relacionados )) !!}</td>
                                                </p>
                                                @else
                                                    <p>Reflexion Personal</p>

                                                    <p>{{$reflexion->contenido}}</p>
                                                @endif
                                                <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> {{$reflexion->created_at->formatLocalized('%d-%m-%Y')}}</small></p>

                                                    @foreach(($reflexion->getEtiqueta()->get()->all()) as $etiquetas)

                                                        <p><i class="fas fa-tag"></i>     <a href=" {{ url('Situ/public#'.$etiquetas->etiqueta_id)}}">{{$etiquetas->etiqueta_id}}</a>
                                                        </p> @endforeach

                                            </blockquote>

                                        </li>


                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <ul class="timeline">
                            <li>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <div class="alert alert-warning"><a href="" >! Comienza añadiendo tus reflexiones a la plataforma !</a>
                                        </div>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    @endif

                </div>
            </div>
        </div>


        <div id="push"></div>
    </div>
    <footer id="footer">

    </footer>

    </div>


    </div><!-- /#wrapper -->

    <!--  jQuery -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <link rel="stylesheet" href="/css/situCss/jquery-ui.css" />
    <script src="/js/situJs/_jquery-ui.js"></script>
    <script src="/js/tinymce/js/tinymce/jquery.tinymce.min.js"></script>
    <script src="/js/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="/js/tinymce/js/tinymce/init-tinymce.js"></script>
    <script src="/js/tinymce/js/tinymce/langs/es.js"></script>

    <link rel="stylesheet" href="/css/situCss/bootstrap-datepicker3.css" />

    <script>      $(function() {
            $('.chosen-select').chosen();
            $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
        });
    </script>

    <script>

    </script>


    <script>
        $(document).ready(function () {
            var sel = document.getElementById('etiquetas');
            var opts = sel.options;


            for (var i=0;i<opts.length;i++) {
                opts[i].value = opts[i].text;
            }
            var selectedValue = $("input[name='hecho_relacionado']:checked").val();
            console.log(selectedValue);
            if(selectedValue=='vincular') {
                $('#seleccionarHecho').show();
                $('#selectorHecho').focus();


            }else{
                $('#seleccionarHecho').hide();

            }
        });
        $("input[type='radio']").on('change', function () {
            var selectedValue = $("input[name='hecho_relacionado']:checked").val();
                console.log(selectedValue);
            if(selectedValue=='vincular') {
                $('#seleccionarHecho').show();
                $('#selectorHecho').focus();


            }else{
                $('#seleccionarHecho').hide();

            }

        });

    </script>


    <script>


        $('#fraseButton').on('click', function () {
            var selectedValue = $("input[name='hecho_relacionado']:checked").val();

            if(selectedValue=='vincular') {
                var id= $('#selectorHecho').find(":selected").val();

            }else{
                var id= null;

            }
            var data =  $('#contenido').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var etiqueta =  $('#etiquetas').val();

            var categoria=$('#selectorHecho').find(":selected").attr("id");
            $.ajax({
                type:"post",
                url     : "{{ route('reflexion') }}",
                data: {
                    contenido: data,
                    hecho: id,
                    etiqueta: etiqueta,

                    etiqueta:etiqueta,
                    categoria_id:categoria,
                    _token: CSRF_TOKEN

                },
                success: function(response){ // What to do if we succeed
                    {{--window.location.href= "{{ url('Alumno/alumnoDashboard') }} ";--}}
                  location.reload();

                    // table.ajax.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });



        } );

        $('#verHecho').on('click', function () {
            var id= $('#selectorHecho').find(":selected").val();
            var categoria=$('#selectorHecho').find(":selected").attr("id");
     window.location.href= "{{url('Situ/public/')}}/"+id+"/"+categoria+"";




        } );


    </script>
@stop






