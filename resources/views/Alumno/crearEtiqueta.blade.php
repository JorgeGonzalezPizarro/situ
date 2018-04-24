@extends('layouts.layoutAdmin')
<script src="/js/jquery-3.3.1.min.js"></script>

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.js"></script>--}}
<style>
    input {
        border: 0 !important;
        border-bottom: 1px solid #ddd !important;
        padding: 7px !important;
        width:  80%;
    }
</style>
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
            {{ Form::open(array('url' => route('guardarEtiquetaAlumno'), 'class' => 'form-horizontal form-signin','files' => true)) }}
            {!! csrf_field() !!}

            <div class="form-group  {{ $errors->has('first_name') ? 'has-error' : ''}}">
                <label for="nombre" class="cols-sm-2 control-label">Nombre Etiqueta </label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        {!! Form::text('nombre', null, ['class' => 'form-control','requiered'=>'true','placeholder '=>'Nombre de la etiqueta']) !!}
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

            <div class='col-md-9' style="    margin-top: 30px;text-align: center;
                                      margin-left: 200px;">

                {!! Form::submit('Confirmar', array('class'=>'btn btn-info ' ,'id'=>'boton' ,'requiered'=>'true', 'style="margin-right:30px"')) !!}</td>

            </div>






            {{ Form::close() }}
        </div>
    </div>



@endsection
