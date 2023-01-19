@extends('layouts.app')

@section('content')



<div class="container">



    <div class="sidebar">
        <a class="active" href="#home">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
    </div>



    <div class="panel">
        <div class="panel-heading">

            <h6>Send Mail</h6>

        </div>

        <div class="panel-body">

            <form action="{{action([App\Http\Controllers\MailController::class, 'store'])}}" method="post">

                @csrf

                <div class="form-group">
                    <label for="to">Receipient</label>
                    <input class="form-control" type="text" name="to">
                </div>

                <div class="form-group">
                    <label for="to">Subject</label>
                    <input class="form-control" type="subject" name="subject">
                </div>

                <div class="form-group">
                    <label for="to">Message</label>
                    <textarea class="form-control" name="message"></textarea>
                </div>

                <input type="submit" value="SEND">



            </form>

        </div>
    </div>





</div>
@endsection