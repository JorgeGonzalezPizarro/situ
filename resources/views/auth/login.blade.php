@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    {{ Form::open(array('url' => route('login'), 'class' => 'form-horizontal form-signin','files' => true)) }}
                    <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
                    <hr class="colorgraph"><br>
                    {!! csrf_field() !!}
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        <div class="col-sm-12">
                            {!! Form::text('email', null, ['class' => 'form-control','placeholder '=>'E-mail']) !!}
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                        <div class="col-sm-12">
                            {!! Form::password('password', ['class' => 'form-control','placeholder '=>'Password']) !!}
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
        </div>
    </div>
</div>
@endsection
