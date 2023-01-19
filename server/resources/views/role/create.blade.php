@extends('layouts.app')

@section('content')


<div class="content" style="width: 80%; margin:auto;">




    <div class="card">
        <div class="card-body">
            <form action="{{action([App\Http\Controllers\RoleController::class, 'store'])}}" method="POST">

                @csrf
                <div class="form-group">
                    <label for="role_name">Designation</label>
                    <input style="width:40%" type="text" name="role_name" class="form-control" placeholder="Enter Role Name">

                </div>

                <div class="form-group">
                    <label for="role_code">Enter Code</label>
                    <input style="width:40%" type="text" name="role_code" class="form-control" placeholder="Enter Designated Role Code">

                </div>


                <a type="submit" class="action-link">Submit</a>

            </form>

        </div>
    </div>





</div>

@endsection