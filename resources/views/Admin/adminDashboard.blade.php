@extends('layouts.layoutAdmin')
<script src="/js/jquery-3.3.1.min.js"></script>

@section('content')

    <div class="col-lg-10 col-lg-offset-1">

        <h1><i class="fa fa-users"></i> Hola   @if(Sentinel::check()) {{   Sentinel::getUser()->first_name }} @endif   </h1>

        <div class="table-responsive" style="overflow-x: hidden" >
            <table id="usuarios" class="mdl-data-table" cellspacing="0" width="100%">

                <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
                </thead>

                <tbody id="clickable">



                    @foreach ($users as $user)
                        <tr id="" style="cursor: pointer">
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->email}}</td>

                        </tr>
                    @endforeach

                </tbody>

            </table>
        </div>

        <a href="/register" class="btn btn-success">Add User</a>

    </div>

@endsection

<script>
    $(document).ready(function() {
        var url = "/Admin";

        var tr = $('#clickable');
        var table=$('#usuarios').DataTable({ "scrollX": false});
        $('#clickable').on('click','tr', function () {

            var data = table
                .rows()
                .data();
            var cData = table.cell(this).data();
            var data = table.row( this ).data();
            alert( 'You clicked on '+data[2]+'\'s row' );
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


            $.ajax({
                   type:"POST",
                   url: url + '/' + 'actualizarUsuario/',
                   data: {
                       email: data[2],
                       _token: CSRF_TOKEN
                   }
               });


        } );
    } );
</script>
    <!-- Scripts -->
