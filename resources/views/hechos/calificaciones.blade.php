@extends('layouts.layoutAdmin')
<script src="/js/jquery-3.3.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.js"></script>
<style>
    input {
        border: 0 !important;
        border-bottom: 1px solid #ddd !important;
        padding: 7px !important;
        width:  80%;
    }
</style>
@section('content')




    <div class="container target">
        <div class="row">
            {{ Form::open(array('route' => 'actualizarDatos', 'class' => 'form-style-8','files' => true)) }}


            <div class="col-sm-12">
                <h1 class="" style="text-align: center">{{ $user->first_name  }}</h1>

                <h1 class="" style="text-align: center">Mis Calificaciones</h1>
                <br>
                <br>
            </div>
        </div>




        <div class="row">


            <div class="col-sm-12" style="" contenteditable="false">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad">


                    <div class="panel panel-info">
                        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                            <div class="collapse navbar-collapse" id="navbarColor03">
                                <ul class="nav navbar-nav ">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{route('misDatos')}}">Personales <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('misDatosAcademicos')}}">Académicos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Profesionales</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Otros datos</a>
                                    </li>
                                </ul>

                            </div>
                        </nav>
                        <div class="panel-body">
                            <div class="row">



                                <div class=" col-md-12 col-lg-12 ">
                                    <table class="table table-user-information">

                                        <tbody>
                                        <div class="form-group" style="">

                                                <div style="padding-left: 10px;">
                                                       {{--<input type="select" value="{{$cur->id}}">--}}
                                                    {!! Form::select('etiqueta', $curso, NULL, ['class' => 'form-control chosen-select', 'name' => 'etiqueta[]', 'multiple tabindex' => 0]) !!}
                                                    {{--{{Form::select('etiqueta', $c->curso)}}--}}

                                                </div>
                                        </div>
                                        </tbody>

                                    </table>
                                    <div class='col-md-8' style="    margin-top: 10px;
                                      margin-left: 240px;">

                                        {!! Form::submit('Create Post', array('class'=>'btn btn-info disabled' ,'id'=>'boton' , 'style="margin-right:30px"')) !!}</td>

                                    </div>

                                    {!! Form::close() !!}

                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button"
                               class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                            <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button"
                               class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button"
                               class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                        </div>

                    </div>
                </div>
            </div>


            <div id="push"></div>
        </div>
        <footer id="footer">
            <div class="row-fluid">
                <div class="span3">
                    <p>
                        <a href="http://twitter.com/Bootply" rel="nofollow" title="Bootply on Twitter" target="ext">Twitter</a><br>
                        <a href="https://plus.google.com/+Bootply" rel="publisher">Google+</a><br>
                        <a href="http://facebook.com/Bootply" rel="nofollow" title="Bootply on Facebook" target="ext">Facebook</a><br>
                        <a href="https://github.com/iatek/bootply" title="Bootply on GitHub" target="ext">GitHub</a><br>
                    </p>
                </div>
                <div class="span3">
                    <p>
                        <a data-toggle="" role="button" href="">Contact Us</a><br>
                        <a href="/tags">Tags</a><br>
                        <a href="/bootstrap-community">Community</a><br>
                        <a href="/upgrade">Upgrade</a><br>
                    </p>
                </div>
                <div class="span3">
                    <p>
                        <a href="http://www.bootbundle.com" target="ext" rel="nofollow">BootBundle</a><br>
                        <a href="https://bootstrapbay.com/?ref=skelly" target="_ext" rel="nofollow"
                           title="Premium Bootstrap themes">Bootstrap Themes</a><br>
                        <a href="http://www.bootstrapzero.com" target="_ext" rel="nofollow"
                           title="Free Bootstrap templates">BootstrapZero</a><br>
                        <a href="http://upgrade-bootstrap.bootply.com/">2.x Upgrade Tool</a><br>
                    </p>
                </div>
                <div class="span3">
                    <span class="pull-right">©Copyright 2013-2014 <a href="/"
                                                                     title="The Bootstrap Playground">Bootply</a> | <a
                                href="/about#privacy">Privacy</a></span>
                    <a href="../js/tinymce/js/tinymce/plugins/responsive_filemanager/filemanager/dialog.php?type=2&field_id=fieldID4'&fldr=" class="btn iframe-btn" type="button">Open Filemanager</a>

                </div>
            </div>
        </footer>

    </div>


    </div><!-- /#wrapper -->



@endsection


{{--<script src="/js/jquery-3.3.1.min.js"></script>--}}

{{--<script type="text/javascript">--}}
{{--$(function(){--}}
{{--$('.iframe-btn').fancybox({--}}
{{--'width'	: 1024,--}}
{{--'minHeight'	: 600,--}}
{{--'type'	: 'iframe',--}}
{{--'autoScale'   : true--}}
{{--});--}}
{{--});--}}
{{--</script>--}}
<script>
    $(document).ready(function () {
        //     $(function(){
        //         $('.iframe-btn').fancybox({
        //             'width'	: 1024,
        //             'minHeight'	: 600,
        //             'type'	: 'iframe',
        //             'autoScale'   : true
        //         });
        //     });

        // parent.$.fancybox.close();
        $('input[name=imagen]').change(function() {



        });
        document.getElementById('boton').disabled = true;
        $('i').on('click',function () {
            $('#boton').removeClass('btn btn-info disabled');
            $('#boton').addClass('btn btn-success');
            document.getElementById('boton').disabled = false;


        })

        var tr = $('#clickable');

        $('#clickable').on('click', function () {


            $('#first_name').attr('readonly', false).focus().css("background-color", "#bfe1e847");
        });
        $('#clickable1').on('click', function () {
            $('#last_name').attr('readonly', false).focus().css("background-color", "#bfe1e847");
            ;


        });

        $('#clickable2').on('click', function () {

            $('#email').attr('readonly', false).focus().css("background-color", "#bfe1e847");
            ;
        });
        $('#clickable3').on('click', function () {

            $('#password').attr('readonly', false).focus().css("background-color", "#bfe1e847").val('');

            $('#password_confirmation').attr('readonly', false).css("background-color", "#bfe1e847");

        });
        $('#clickableFb').on('click', function () {

            $('#fieldIDfacebook').attr('readonly', false).focus().css("background-color", "#bfe1e847")



        });



        {{--var data = table--}}
        {{--.rows()--}}
        {{--.data();--}}
        {{--var cData = table.cell(this).data();--}}
        {{--var data = table.row( this ).data();--}}
        {{--//alert( 'You clicked on '+data[2]+'\'s row' );--}}
        {{--var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}

        {{--$.ajax({--}}
        {{--type: "get",--}}
        {{--url: "{{ route('actualizarDatos') }}",--}}
        {{--datatype: "json",--}}
        {{--encode: true,--}}
        {{--data: {--}}
        {{--first_name: document.getElementById('first_name'),--}}
        {{--first_name: document.getElementById('last_name'),--}}
        {{--email: document.getElementById('email'),--}}

        {{--_token: CSRF_TOKEN--}}
        {{--},--}}
        {{--success: function (response) { // What to do if we succeed--}}
        {{--window.location.href= "{{ url('Alumno/hecho') }}"+"/"+response['id'] + "/singleHecho";--}}
        {{--console.log("aa+ " + response);--}}

        {{--},--}}
        {{--error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail--}}
        {{--console.log(JSON.stringify(jqXHR));--}}
        {{--console.log("AJAX error: " + textStatus + ' : ' + errorThrown);--}}
        {{--}--}}




    });




</script>
<script>function responsive_filemanager_callback(field_id){
        console.log(field_id);

        var url=jQuery('#'+field_id).val();
        // $('#myModal').modal('hide');


        $('#myimage').attr('src', url);

    }



</script>