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
    </div>


    </div>


@endsection

