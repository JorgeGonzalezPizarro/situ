@extends('layouts.layoutAdmin')


@section('content')

    <div class = "container">
        <div class="wrapper">
            <div class="panel-heading">
                <div class="panel-title text-center">
                    <h1 class="title">Crear nueva etiqueta</h1>
                    <hr />
                </div>
            </div>

            {{ Form::open(array('url' => route('guardarEtiqueta'), 'class' => 'form-horizontal form-signin','files' => true)) }}
            {!! csrf_field() !!}

                <label for="nombre" class="cols-sm-2 control-label">Nombre Etiqueta </label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        {!! Form::text('nombre', null, ['class' => 'form-control','placeholder '=>'Nombre de la etiqueta']) !!}
                    </div>
                    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
                </div>
                <label for="slug" class="cols-sm-2 control-label">Slug</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        {!! Form::text('slug', null, ['class' => 'form-control','placeholder '=>'Slug para la etiqueta']) !!}
                    </div>
                </div>
                <label for="color" class="cols-sm-2 control-label">Color</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        {!! Form::text('color', null, array('class' => 'form-control color', 'placeholder' => 'Color')) !!}
                        {!! Form::text('color', null, array('class' => 'form-control color', 'placeholder' => 'Color')) !!}
                    </div>
                    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


                <label for="color" class="cols-sm-2 control-label">Color</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        {!! Form::submit('Create Post', array('class'=>'btn btn-info ' ,'id'=>'boton' , 'style="margin-right:30px"')) !!}</td>
                    </div>
                    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
                </div>



            {{ Form::close() }}
        </div>
    </div>



@endsection

