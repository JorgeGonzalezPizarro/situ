@extends('layouts.layoutAdmin')

@section('content')

    <div class="col-lg-10 col-lg-offset-1">

        <h1><i class="fa fa-users"></i> Hola   @if(Sentinel::check()) {{   Sentinel::getUser()->first_name }} @endif   </h1>

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
                    <tr>
                        @if (Sentinel::check() )
                            <td>{{Sentinel::getUser()->first_name}}</td>
                            <td>{{Sentinel::getUser()->last_name}}</td>
                        @endif


                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>

                        </tr>
                    @endforeach

                </tbody>

            </table>
        </div>

        <a href="/register" class="btn btn-success">Add User</a>

    </div>

@endsection

</div>

    <!-- Scripts -->

