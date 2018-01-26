@extends('layouts.app')

@section('content')

    <div class="col-lg-10 col-lg-offset-1">

        <h1><i class="fa fa-users"></i> User Administration <a href="/logout" class="btn btn-default pull-right">Logout</a></h1>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Date/Time Added</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                {{--@foreach ($users as $user)--}}
                    <tr>
                        @if (Sentinel::check() )
                            Your name : {{Sentinel::getUser()->name}} <br>
                            Last name : {{Sentinel::getUser()->last_name}} <br>
                            E-mail : {{Sentinel::getUser()->email}} <br>
                        @endif
                        <td>{{Sentinel::getUser()->name.' ' .Sentinel::getUser()->last_name}}</td>
                            <td>{{Sentinel::getUser()->name.' ' .Sentinel::getUser()->last_name}}</td>

                </tbody>

            </table>
        </div>

        <a href="/user/create" class="btn btn-success">Add User</a>

    </div>

@endsection