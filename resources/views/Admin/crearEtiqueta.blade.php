@extends('layouts.layoutAdmin')


@section('css')
    <link href="{{ asset('colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        .colorpicker-2x .colorpicker-saturation {
            width: 200px;
            height: 200px;
        }
        .colorpicker-2x .colorpicker-hue,
        .colorpicker-2x .colorpicker-alpha {
            width: 30px;
            height: 200px;
        }
        .colorpicker-2x .colorpicker-color,
        .colorpicker-2x .colorpicker-color div{
            height: 30px;
        }
    </style>
@stop
@section('content')

    <div class = "container">
        <div class="wrapper">
            <div class="panel-heading">
                <div class="panel-title text-center">
                    <h1 class="title">Crear nueva etiqueta</h1>
                    <hr />
                </div>
            </div>
            @if (Session::has('message'))
                <div class="alert alert-{{(Session::get('status')=='error')?'danger':Session::get('status')}} " alert-dismissable fade in id="sessions-hide">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{Session::get('status')}}!</strong> {!! Session::get('message') !!}
                </div>
            @endif
            {{ Form::open(array('url' => route('guardarEtiqueta'), 'class' => 'form-horizontal form-signin','files' => true)) }}
            {!! csrf_field() !!}

            <div class="form-group  {{ $errors->has('first_name') ? 'has-error' : ''}}">
                <label for="nombre" class="cols-sm-2 control-label">Nombre Etiqueta </label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        {!! Form::text('nombre', null, ['class' => 'form-control','placeholder '=>'Nombre de la etiqueta']) !!}
                    </div>
                    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group  {{ $errors->has('first_name') ? 'has-error' : ''}}">
                <label for="slug" class="cols-sm-2 control-label">Slug</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        {!! Form::text('slug', null, ['class' => 'form-control','placeholder '=>'Slug para la etiqueta']) !!}
                    </div>
                    {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group  {{ $errors->has('last_name') ? 'has-error' : ''}}">
                <label for="color" class="cols-sm-2 control-label">Color</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        {!! Form::text('color', null, array('class' => 'form-control color', 'placeholder' => 'Color')) !!}
                    </div>
                    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
                </div>
            </div>




            <div class="form-group  {{ $errors->has('password') ? 'has-error' : ''}} ">
                <button class="btn btn-primary btn-lg btn-block register-button" type="submit" >Crear</button>

            </div>



            {{ Form::close() }}
        </div>
    </div>



@endsection

@section('scripts')
    <!-- Color picker -->
    <script src="{{ asset('colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script>
        $(function(){
            $('.color').colorpicker({
                customClass: 'colorpicker-2x',
                sliders: {
                    saturation: {
                        maxLeft: 200,
                        maxTop: 200
                    },
                    hue: {
                        maxTop: 200
                    },
                    alpha: {
                        maxTop: 200
                    }
                }
            });
        });
    </script>
@stop