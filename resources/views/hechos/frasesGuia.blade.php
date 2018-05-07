@extends('layouts.layoutAdmin')
<link href="{{ asset('chosen/bootstrap.min.css') }}" rel="stylesheet">


<!-- Latest compiled and minified JavaScript -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>--}}

{{--<!-- (Optional) Latest compiled and minified JavaScript translation files -->--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>--}}


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

                            <div class="col-md-11">
                                {!! Form::textarea('contenido', Input::old('contenido') , ['id'=>'contenido','placeholder'=>'Frase guía','style'=>'    margin-top: 0px; margin-bottom: 0px;width: 100%;height: 70px;']) !!}
                               <br>
                                <br>

                                <span>{!! Form::select('etiqueta', $etiqueta, null, ['id'=>'etiquetas','class' => 'form-control chosen-select', 'name' => 'etiqueta[]', 'multiple tabindex' => 6]) !!}
                              </span>


                            </div>






                            <div class="col-md-1" style="margin-top: 95px">
                                {!! Form::button('Guardar', array('class'=>'btn btn-info ' ,'id'=>'fraseButton' , 'style=""')) !!}</td>

                            </div>
                        </nav>

                    @if(count($hechos)>0)
                        <div class="panel-body">

                            <div class="row">

                                @foreach($hechos as $hecho)
                                <ul class="timeline">
                                    <li>
                                        <blockquote class="quote-card">
                                            <p>{{$hecho->contenido}}</p>
                                            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> {{$hecho->created_at->formatLocalized('%d-%m-%Y')}}</small></p>
                                    @foreach(($hecho->getEtiqueta()->get()->all()) as $etiquetas)

                                                <p><i class="fas fa-tag"></i>     <a href=" {{ url('Situ/public#'.$etiquetas->etiqueta_id)}}">{{$etiquetas->etiqueta_id}}</a>
                                                </p> @endforeach

                                        </blockquote>

                                    </li>


                                        <!-- Categories Widget -->


                                </ul>
                                @endforeach
                                </div>
                            </div>
                    @else
                        <ul class="timeline">
                            <li>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                    <div class="alert alert-warning"><a href="{{ route('hechos', ['categoria'=>"Frases Guia"])}}" >Comienza añadiendo tus frases preferidas a la plataforma !</a>
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


            var sel = document.getElementById('etiquetas');
            var opts = sel.options;


            for (var i=0;i<opts.length;i++) {
                opts[i].value = opts[i].text;
            }
            // $('#password').attr('readonly', false).focus().css("background-color", "#bfe1e847").val('');









    </script>
    <script>function responsive_filemanager_callback(field_id){
            console.log(field_id);

            var url=jQuery('#'+field_id).val();
            // $('#myModal').modal('hide');


            $('#myimage').attr('src', url);

        }



    </script>

    <script>

        $('#fraseButton').on('click', function () {
            var data =  $('#contenido').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var etiqueta =  $('#etiquetas').val();

            $.ajax({
                type:"post",
                url     : "{{ route('fraseguia') }}",
                encode  : true,
                data: {
                    contenido: data,
                    etiqueta: etiqueta,
                    categoria_id:3,
                    _token: CSRF_TOKEN

                },
                success: function(response){ // What to do if we succeed
                    {{--window.location.href= "{{ url('Alumno/alumnoDashboard') }} ";--}}
                     location.reload();
                    // console.log(JSON.stringify(response));

                    // table.ajax.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });



        } );
    </script>
@stop






