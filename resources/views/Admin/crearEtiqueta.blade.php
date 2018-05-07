@extends('layouts.layoutAdmin')


@section('content')

    <div class = "container">
            <div class="panel-heading">
                <div class="panel-title text-center">
                    <h1 class="title">Crear nueva etiqueta</h1>
                    <hr />
                </div>
            </div>

            {{ Form::open(array('url' => route('guardarEtiqueta'), 'class' => 'form-horizontal form-signin','files' => true)) }}
            {!! csrf_field() !!}
            <div class="form-group  {{ $errors->has('nombre') ? 'has-error' : ''}}">

                <label for="nombre" class="cols-sm-2 control-label">Nombre Etiqueta </label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-tags"></i>

</span>
                        {!! Form::text('nombre', null, ['class' => 'form-control','required','placeholder '=>'Nombre de la etiqueta']) !!}
                    </div>
                    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
                <div class="form-group  {{ $errors->has('slug') ? 'has-error' : ''}}">

                <label for="slug" class="cols-sm-2 control-label">Slug</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-tags"></i>

</span>
                        {!! Form::text('slug', null, ['class' => 'form-control','placeholder '=>'Slug para la etiqueta','required']) !!}
                    </div>
                    {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}

                </div>
                </div>
    <div class="form-group  {{ $errors->has('slug') ? 'has-error' : ''}}">

    <label for="slug" class="cols-sm-2 control-label"></label>


                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-check"></i>

</span>
                        {!! Form::submit('Confirmar', array('class'=>'btn btn-info ' ,'id'=>'boton' , 'style="margin-right:30px"')) !!}</td>
                    </div>
                    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
                </div>



            {{ Form::close() }}


        <hr>
        <br>
        <br>
        <div style="    color: #ffffff;
    background-color: #003865;
    border-color: #bce8f1;" class="panel-heading">ETIQUETAS <i class="fas fa-tag"></i></div>
        <ul class="list-group">

            </li>
            @if(isset($etiquetas))
                @foreach($etiquetas as $etiqueta)
                    <li class="list-group-item text-left"><span class=""><strong
                                    class="">{!!$etiqueta->nombre!!}</strong></span>
                        <a href="#" id="{{$etiqueta->id}}" onclick="eliminarEtiqueta(this.id);"><i class="far fa-trash-alt" style="color: red;"></i></a></span>
                        @if($etiqueta->user_id != null)
                            <span style="font-style: italic;">Personalizada</span>
                            @endif

                    </li>
                @endforeach
            @endif




        </ul>
        {{--<ul class="list-group">--}}



        {{--@foreach($etiquetasPublic as $etiquetaPubli)--}}
        {{--@if(isset($etiquetaPubli))--}}

        {{--<li class="list-group-item text-left"><span class=""><strong--}}
        {{--class="">{!!$etiquetaPubli->slug!!}</strong></span>--}}
        {{--<a href="#" id="{{$etiquetaPubli->id}}" onclick="eliminarEtiqueta(this.id);"><i class="far fa-trash-alt" style="color: red;"></i></a></span>--}}

        {{--</li>                @endif--}}

        {{--@endforeach--}}


        {{--</ul>--}}
    </div>
    </div>




@endsection


<script>

    function eliminarEtiqueta(id) {
        $.ajax({
            type: "get",
            url: "{{ route('eliminarEtiquetaAdmin') }}",
            datatype: "json",
            encode: true,
            data: {
                id: id,
            },
            success: function (response) { // What to do if we succeed
                console.log(response);
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });





    }

</script>