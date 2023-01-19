@extends('layouts.app')

@section('content')

<h3 style="text-align:center;">Role Assignment For ID {{$id}}</h3>


<div class="content" style="width: 80%; margin:auto;">

    <div class="card" style="width: 40%;">


        <div class="card-body">

            <h5> The User Name is {{$user->name}}</h5>
            <p>Email: {{$user->email}}</p>
            <p>Role: {{$user->role_id==0?'In No Role Specified':$user->role_id}}</p>

            <p>Provide Role</p>

            


        </div>

    </div>



</div>





@endsection