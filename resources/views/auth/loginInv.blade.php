@extends('layouts.app')
@section('title')
    Login
@stop
@section('content')
    <div class = "container">
        <div class="wrapper">
            @if (Session::has('message'))
                <div class="alert alert-{{(Session::get('status')=='error')?'danger':Session::get('status')}} " alert-dismissable fade in id="sessions-hide">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{Session::get('status')}}!</strong> {!! Session::get('message') !!}
                </div>
            @endif
            {{ Form::open(array('url' => route('login'), 'class' => 'form-horizontal form-signin','files' => true,'id'=>'form')) }}
            <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
            <hr class="colorgraph"><br>
            {!! csrf_field() !!}
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                <div class="col-sm-12">
                    {!! Form::text('email', $email, ['class' => 'form-control','placeholder '=>'E-mail',"value"=>$email , " autocomplete"=>"off"]) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                <div class="col-sm-12">
                    {!! Form::text('password', $decrypted, ["value"=>$decrypted,'class' => 'form-control','placeholder '=>'E-mail',"id"=>"password"]) !!}

                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>

            <div class="login-register">
                <a href="{{url('register')}}">Register</a>
                <a href="{{url('password/reset')}}">Forget Password</a>
                @if ($errors->has('global'))
                    <span class="help-block danger">
                    <strong style="color:red" >{{ $errors->first('global') }}</strong>
                </span>
                @endif
            </div>
            </form>

        </div>
    </div>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

    <script>$(document).ready(function(){
            var value = document.getElementById('password').value;

        if(value.length >0) {
            $("form#form").submit();
        }
        else{
            $("#password").on('change',function(){
                $("form#form").submit();


            })
        }
        });
    </script>
@endsection


