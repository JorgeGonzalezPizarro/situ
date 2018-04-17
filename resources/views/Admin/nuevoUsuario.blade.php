@extends('layouts.layoutAdmin')

{{--<script src="/js/tinymce/js/tinymce/jquery.tinymce.min.js"></script>--}}

@section('content')
<div class = "container">
    <div class="col-lg-12">

    <div class="wrapper">
        <div class="panel-heading">
            <div class="panel-title text-center">
                <h1 class="title">Registrar Usuario</h1>
                <hr />
            </div>
        </div>
        @if (Session::has('message'))
            <div class="alert alert-{{(Session::get('status')=='error')?'danger':Session::get('status')}} " alert-dismissable fade in id="sessions-hide">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong> {!! Session::get('message') !!}!</strong>
                </div>
            @endif
            {{ Form::open(array('url' => route('register'), 'class' => 'form-horizontal form-signin','files' => true)) }}
            {!! csrf_field() !!}

            <div class="form-group  {{ $errors->has('first_name') ? 'has-error' : ''}}">
                <label for="first_name" class="cols-sm-2 control-label">Nombre</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        {!! Form::text('first_name', null, ['class' => 'form-control','placeholder '=>'Ingrese el nombre']) !!}
                    </div>
                    {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group  {{ $errors->has('last_name') ? 'has-error' : ''}}">
                <label for="last_name" class="cols-sm-2 control-label">Apellido</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        {!! Form::text('last_name', null, ['class' => 'form-control','placeholder '=>'Ingrese el apellido']) !!}
                    </div>
                    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group  {{ $errors->has('email') ? 'has-error' : ''}}">
                <label for="email" class="cols-sm-2 control-label">Email</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                        {!! Form::email('email', null, ['class' => 'form-control','placeholder '=>'E-mail']) !!}
                    </div>
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group  {{ $errors->has('password') ? 'has-error' : ''}}">
                <label for="password" class="cols-sm-2 control-label">Contraseña</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                        {!! Form::password('password', ['class' => 'form-control','rel'=>'gp' ,'data-size'=>'10' ,'data-character-set'=>'a-z,A-Z,0-9,#' ,'placeholder '=>'Ingrese la contraseña']) !!}

                    </div>
                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group  {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                <label for="confirm" class="cols-sm-2 control-label">Confirmar Contraseña</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                        {!! Form::password('password_confirmation', ['class' => 'form-control','rel'=>'gp' ,'data-size'=>'10' ,'data-character-set'=>'a-z,A-Z,0-9,#' ,'placeholder '=>'Confirmar contraseña']) !!}

                    </div>
                    {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <label for="name" class="cols-sm-2 control-label">Rol</label>

            <div id="rolesDiv" class="form-group  {{ $errors->has('first_name') ? 'has-error' : ''}}">
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>

                        {!! Form::select('roles[]', $roles ,$roles,['id'=>'roles','class' => 'form-control','data-live-search'=>'true']) !!}
                        {{--{!! Form::select('roles[]', ['3'=>'Profesor','4'=>'Invitado'] ,$roles, ) !!}--}}



                    </div>
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}

                </div>
            </div>

            <div id="rolesDiv1" class="form-group  ">
            </div>
            <div class="form-group  {{ $errors->has('password') ? 'has-error' : ''}} ">
                <button class="btn btn-primary btn-lg btn-block register-button" type="submit" >Registrar</button>

            </div>

            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
@section('scripts')

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script>      $(function() {
        $('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
    });
</script>
<script>

    $(document).ready(function () {

            $('#roles').on('change',function () {

                var e = document.getElementById("roles");
                var strUser = e.options[e.selectedIndex].text;
                $("#rolesDiv1").empty();

                if(strUser == 'Prof' )
                {

                    fecha_limite();

                    date();
                }
            })



    });

</script>
<script type="text/javascript">
    function date() {
        $(function () {
            $('#datetimepicker1').datetimepicker({
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
                format: 'YYYY-MM-DD',
            });


        });
        function getFormattedDate(date) {
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear().toString().slice(2);
            return day + '-' + month + '-' + year;
        } }


</script>

<script type="text/javascript">
    function fecha_limite() {


        var html=             '            <label for="name" class="cols-sm-2 control-label">Fecha Limite </label>\n <div class="cols-sm-10"> '  +
            ' <div class="input-group date" id="datetimepicker1">'
            +  '<span class="input-group-addon">'
            +   '<span class="glyphicon glyphicon-calendar"></span>'
            +    ' </span>'

            +  '   <input type="text" class="form-control" name="fecha_limite" required />'

            +   '</div>';


        $("#rolesDiv1").append(html);






    }
</script>
    @endsection