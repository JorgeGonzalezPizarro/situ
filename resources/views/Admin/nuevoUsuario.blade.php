@extends('layouts.layoutAdmin')

{{--<script src="/js/tinymce/js/tinymce/jquery.tinymce.min.js"></script>--}}

@section('content')
<div class = "container">
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

        <div id="rolesDiv1" class="form-group">
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
        <div id="rolesDiv2" class="">

            <div class="form-group  {{ $errors->has('password') ? 'has-error' : ''}}" id="passwordProf">
                <label for="password" class="cols-sm-2 control-label">Contraseña</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
<<<<<<< HEAD
                        {!! Form::password('password', ['class' => 'form-control','rel'=>'gp' ,'data-size'=>'10' ,'data-character-set'=>'a-z,A-Z,0-9,#' ,'id'=>'password1','placeholder '=>'Ingrese la contraseña']) !!}
=======
                        {!! Form::password('password', ['class' => 'form-control','rel'=>'gp' ,'data-size'=>'10' ,'data-character-set'=>'a-z,A-Z,0-9,#', 'id'=>'password1','placeholder '=>'Ingrese la contraseña']) !!}
>>>>>>> fbb1718ff987a738b9559d3665482b00bad8815e

                    </div>
                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group  {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                <label for="confirm" class="cols-sm-2 control-label">Confirmar Contraseña</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
<<<<<<< HEAD
                        {!! Form::password('password_confirmation', ['class' => 'form-control','rel'=>'gp' ,'data-size'=>'10' ,'id'=>'password2','data-character-set'=>'a-z,A-Z,0-9,#' ,'placeholder '=>'Confirmar contraseña']) !!}
=======
                        {!! Form::password('password_confirmation', ['id'=>'password2','class' => 'form-control','rel'=>'gp' ,'data-size'=>'10' ,'data-character-set'=>'a-z,A-Z,0-9,#' ,'placeholder '=>'Confirmar contraseña']) !!}
>>>>>>> fbb1718ff987a738b9559d3665482b00bad8815e

                    </div>
                    {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
            <div class="form-group  {{ $errors->has('password') ? 'has-error' : ''}} ">
                <button class="btn btn-primary btn-lg btn-block register-button" type="submit" >Registrar</button>

            </div>

            {{ Form::close() }}
        </div>
    </div>

@endsection
@section('scripts')

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    {{--<script src="https://code.jquery.com/jquery-1.9.1.js"></script>--}}
    <script src="https://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

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
                    $("#rolesDiv2").hide();
                    $("#password1").val('111111');
                    $("#password2").val('111111');

                    fecha_limite();

                    // date();

                    // document.getElementById("datetimepicker1").disabled = true;

                    $("#datetimepicker1").datepicker();
                    $.datepicker.regional['es'] = {
                        closeText: 'Cerrar',
                        prevText: '<Ant',
                        nextText: 'Sig>',
                        currentText: 'Hoy',
                        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
                        weekHeader: 'Sm',
                        dateFormat: 'dd/mm/yy',
                        firstDay: 1,
                        isRTL: false,
                        showMonthAfterYear: false,
                        yearSuffix: ''
                    };

                    $.datepicker.setDefaults($.datepicker.regional['es']);

                }
                else{
                    $("#rolesDiv2").show();

                }
            })



    });

</script>


    <script>


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

<script >
    function fecha_limite() {


        var html=             '  <label for="name" class="cols-sm-2 control-label">Fecha Limite </label>'
            +  ' <div class="cols-sm-10"> '

        +'<div class="input-group">'
          +'  <span class="input-group-addon"><i class="fa fa-calendar " aria-hidden="true"></i></span>'
           + '  <input  id="datetimepicker1" type="text" class="form-control" name="fecha_limite" required />'

            +'    </div>'
            +'   </div>';


        $("#rolesDiv1").append(html);






    }
</script>
    @endsection