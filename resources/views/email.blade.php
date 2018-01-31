@extends('layouts.email')

@section('content')

    <div class="col-lg-10 col-lg-offset-1">

        <h1><i class="fa fa-users"></i> Claves de Acceso</h1>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password </th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <tr>


                    <td>{{ $request['first_name']}}</td>
                    <td>{{ $request['email']}}</td>
                    <td>{{ $request['password']}}</td>

                </tbody>

            </table>
        </div>


    </div>

@endsection