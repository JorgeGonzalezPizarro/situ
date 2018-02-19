@extends('layouts.layoutAdmin')
<script src="/js/jquery-3.3.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.js"></script>

@section('content')
    <hr class="">

    <div class="container target">
        <div class="row">
            <div class="col-sm-10">
                <h1 class="">{{ $user->first_name  }}</h1>

                <button type="button" class="btn btn-success">Enviar Correo</button>  <button type="button"  class="btn btn-info">Enviar mensaje</button>
                <br>
            </div>
            <div class="col-sm-2"> <a data-toggle="modal" href="" data-target="#myModal" class="iframe-btn" type="button">
                    <img  id="myimage" title="profile image" src="https://upload.wikimedia.org/wikipedia/commons/7/70/User_icon_BLACK-01.png" class="img-circle img-responsive" name="imagen">
                    <i id=" " class="fa fa-pencil"></i></a>
            </div>
        </div>




        <div class="row">
            <div class="col-sm-3">
                <!--left col-->
                <ul class="list-group">
                    <li class="list-group-item text-muted" contenteditable="false">Perfil</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Fecha  de registro </strong></span>{{ $user->created_at  }} </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Fecha  último acceso</strong></span><span><p>{{ $user->last_login  }} </p></span>
                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Rol </strong></span> {{ $user->roles()->first()->slug }}</li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-heading">Curso / Carrera

                    </div>
                    <div class="panel-body"><i style="color:green"
                                               class="fa fa-check-square"></i>{{ $user->first_name  }}.

                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Redes Sociales <i class="fa fa-link fa-1x"></i>

                    </div>
                    <div class="panel-body"><a href="http://bootply.com" class="">{{ $user->first_name  }}</a>

                    </div>
                </div>

                <ul class="list-group">
                    <li class="list-group-item text-muted">Actividad <i class="fa fa-dashboard fa-1x"></i>

                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Shares</strong></span> 125
                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Likes</strong></span> 13
                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Posts</strong></span> 37
                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong
                                    class="">Followers</strong></span> 78
                    </li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-heading">Social Media</div>
                    <div class="panel-body"><i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i>
                        <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i
                                class="fa fa-google-plus fa-2x"></i>

                    </div>
                </div>
            </div>
            <!--/col-3-->
            <div class="col-sm-9" style="" contenteditable="false">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad">


                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Sheena Shrestha</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">



                                <div class=" col-md-12 col-lg-12 ">
                                    <table class="table table-user-information">
                                        {{ Form::open(array('route' => 'actualizarDatos', 'class' => 'form-style-8','files' => true)) }}
                                        <div class="input-append">
                                            {{--<input id="fieldID4" type="text" name="imagen" style="display: none;">--}}
                                            {!! Form::text('imagen', null, ['id'=>'fieldID4','class' => 'misDatos','readonly' => 'true','style'=>'display:none;' ]) !!}

                                        </div>
                                        <tbody>
                                        <tr>
                                            <td><strong class="">Department:</strong></td>
                                            <td>{!! Form::text('first_name', null, ['id'=>'first_name','class' => 'misDatos','readonly' => 'true','value '=> $user->first_name ]) !!}
                                                <a href="#" id="clickable"> <i id=" " class="fa fa-pencil"></i></a>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="">Department:</strong></td>
                                            <td>{!! Form::text('last_name', null, ['id'=>'last_name','class' => 'misDatos','readonly' => 'true','value '=> $user->last_name ]) !!}
                                                <a href="#" id="clickable1"> <i id=" " class="fa fa-pencil"></i></a>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="">Department:</strong></td>
                                            <td>{!! Form::text('email', null, ['id'=>'email','class' => 'misDatos','readonly' => 'true','value '=> $user->email ]) !!}
                                                <a href="#" id="clickable2"> <i id=" " class="fa fa-pencil"></i></a>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="">Password:</strong></td>
                                            <td>
                                                <input class="field" readonly name="password" id="password" type="password" >

                                                <a href="#" id="clickable3"> <i id=" " class="fa fa-pencil"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            @if (Session::has('error'))
                                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                            @endif
                                                @if (Session::has('msg'))
                                                    <div class="alert alert-info">{{ Session::get('msg') }}</div>
                                                @endif
                                            <td><strong class=""> </strong></td>
                                            <td>

                                                <input name="password_confirmation" class="field" data-match="#new_password" data-match-error="Las contraseñas no coinciden" placeholder="Confirmar Contraseña" required readonly  id="password_confirmation" type="password" value="">
                                                <a href="#" id="clickable4"> <i id=" " class="fa fa-pencil"></i></a>

                                            </td>
                                        </tr>

                                        <tr>
                                            <td><strong class="">Department:</strong></td>
                                            <td><a href="mailto:info@support.com">info@support.com</a></td>
                                        </tr>
                                        <input class="field" name="old_password"  id="old_password" type="hidden" value="{{$user->password}}">


                                        </tbody>

                                    </table>
                                    <div class='col-md-5' style="    margin-top: 10px;
                                      margin-left: 240px;">

                                        {!! Form::submit('Create Post', array('class'=>'btn btn-primary' , 'style="margin-right:30px"')) !!}</td>

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

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                       
                        <div class="modal-body">
                            <iframe width="700" height="400" src="../js/tinymce/js/tinymce/plugins/responsive_filemanager/filemanager/dialog.php?type=2&field_id=fieldID4'&fldr=" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
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



    {{--});--}}

    });




</script>
<script>function responsive_filemanager_callback(field_id){
        console.log(field_id);

        var url=jQuery('#'+field_id).val();
        // $('#myModal').modal('hide');

        alert('update '+field_id+" with "+url);
        $('#myimage').attr('src', url);

    }



</script>