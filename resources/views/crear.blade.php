@extends('layouts.app')

@section('content')
    <p>Page: admin.post.create</p>
    <ol class="breadcrumb">
        <li>
        </li>
        <li class="active">
            <i class="fa fa-plus-square"></i> Create
        </li>
    </ol>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            {!! Form::open(array('route' => 'guardar_Hecho', 'method' => 'POST', 'files' => true )) !!}

            <h2 class="">Create a new Post</h2>

            <div class="form-group">
                {!! Form::label('title', 'Post Title') !!}
                {!! Form::text('titulo_hecho', Input::old('titulo_hecho'), array('class' => 'form-control', 'placeholder' => 'Title')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Tipo de Hecho', 'Tipo de Hecho') !!}

                {{ Form::radio('tipo_hecho', 'Trabajo académico') }}<br>
                {{ Form::radio('tipo_hecho', 'Calificaciones') }}
                {{ Form::radio('tipo_hecho', 'Recuerdos') }}
                {{ Form::radio('tipo_hecho', 'Frases guía') }}
                {{ Form::radio('tipo_hecho', 'Reflexiones') }}
                {{ Form::radio('tipo_hecho', 'Portafolios profesional ') }}
                {{ Form::radio('tipo_hecho', 'Proyectos de investigación') }}

            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Post slug') !!}
                {!! Form::text('proposito', Input::old('proposito'), array('class' => 'form-control', 'placeholder' => 'Proposito')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('image', 'Upload Image') !!}
                {!! Form::file('imagen') !!}
            </div>
            <div class="form-group">

                {!!  Form::select('curso', array('1' => '1º', '2' => '2º' , '3' => '3º' , '4' => '4º' ,'otro' => 'OTRO')); !!}
            </div>
            <div class="form-group" style="">
                {!! Form::label('tags', 'Link tags') !!}
                {!! Form::text('evidencia', Input::old('evidencia'), array('class' => 'form-control', 'placeholder' => 'Evidencia')) !!}

                {!! Form::select('tags', array('IMAGEN' => 'imagen', NULL, ['class' => 'form-control chosen-select', 'name' => 'tags[]', 'multiple tabindex' => 6])) !!}
            </div>

            <div class="form-group">
                {!! Form::label('text', 'Text as Markdown') !!} Click <a href="https://blog.ghost.org/markdown/" target="_blank" >here</a> to get some tips on how to write Markdown.
                {!! Form::textarea('contenido', Input::old('contenido')) !!}
            </div>

            {!! Form::submit('Create Post', array('class'=>'btn btn-primary')) !!}

            {!! Form::close() !!}

        </div><!-- /.col-md-12 -->
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div><!-- /.row -->

@stop

@section('scripts')
    <script>
        var simplemde = new SimpleMDE({
            element: document.getElementById("text"),
            renderingConfig: {
                singleLineBreaks: false,
                codeSyntaxHighlighting: true,
            }
        });
    </script>
@stop

