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
        text-transform: uppercase;
        background-color: #DBE5DF;
        padding: 3px 10px;
        border-radius: 3px;
        color: black;
    }

    .action-link:hover {
        text-decoration: none;
        background: #B6E5CA;

    }
</style>


<h1 style="text-align: center;">Hello Users!</h1>


<div class="content" style="width: 80%; margin:auto;">

    @if($users->count() == 0)

    <p>No Users Found!</p>

    @endif


    @if($users->count() > 0)

    <p style="text-align:end;">Total Users: {{$users->count()}}</p>




    <table class="table">
        <thead>
            <tr>
                <th scope="col">SL</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Special Status</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>

            <?php $sl = 1; ?>

            @foreach($users as $user)

            <tr>
                <td scope="row">{{$sl}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->special_status}}</td>
                <td>
                    <a class="action-link" href="#">Detail</a>
                    <a class="action-link" href="{{route('assign.role.view', ['user' => $user->id])}}">Manage Role</a>

                </td>

            </tr>

            <?php $sl++; ?>


            @endforeach








        </tbody>
    </table>

    @endif


</div>




@endsection