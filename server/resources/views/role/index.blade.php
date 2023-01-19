@extends('layouts.app')

@section('content')

<style>
    table {
        border: 1px solid #DBE5DF;
    }

    thead {

        background: #DBE5DF;
    }

    tr,
    td {
        border: 1px solid #DBE5DF;
    }

    .action-link {
        font-size: 13px;
        font-weight: bold;
        text-transform: uppercase;
        background-color: #DBE5DF;
        padding: 6px 10px;
        border-radius: 3px;
        color: black;
    }

    .action-link:hover {
        text-decoration: none;
        background: #B6E5CA;

    }
</style>


<h1 style="text-align: center;">Application Administritive Roles!</h1>




<div class="content" style="width: 80%; margin:auto;">


    <a class="action-link" href="/role/create">Make a Role</a>


    @if($roles->count() == 0)

    <p>No Role Found!</p>

    @endif


    @if($roles->count() > 0)

    <p style="text-align:end;">Total Users: {{$roles->count()}}</p>




    <table class="table">
        <thead>
            <tr>
                <th scope="col">SL</th>
                <th scope="col">Role Name</th>
                <th scope="col">Code</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>

            <?php $sl = 1; ?>

            @foreach($roles as $role)

            <tr>
                <td scope="row">{{$sl}}</td>
                <td>{{$role->role_name}}</td>
                <td>{{$role->role_code}}</td>
                <td>
                    <a class="action-link" href="#">Detail</a>

                </td>

            </tr>

            <?php $sl++; ?>


            @endforeach








        </tbody>
    </table>

    @endif


</div>




@endsection