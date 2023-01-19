@extends('layouts.app')

@section('content')

<!-- styles--->
<style>
    .content {
        background-color: skyblue;
        padding: 10px;
    }

    .submit {
        width: 20%;
        background-color: #64C88F;
        border: 3px solid #FFFFFF;
        border-radius: 5px;
        color: #FFFFFF;
    }

    form {
        width: 40%;
        margin: auto;
        padding: 10px;
        background-color: #FFFFFF;
    }

    label {
        width: 30%;
        float: left;
        padding: 2px 5px;

    }

    input {
        width: 70%;
        float: left;
        padding: 2px 5px;
    }

    textarea {
        width: 100%;
        padding: 10px;
    }

    .form-heading {
        font-style: italic;
        text-align: center;
    }
</style>

<!-- Markup -->

<div class="content">




    <form action="/articles/custom" method="post">

        <p class="form-heading">Write a blog post</p>


        @if($errors->any())

        <div class="alert alert-danger">

            @foreach($errors->all() as $error)
            <li>{{$error}}</li>


            @endforeach

        </div>

        @endif


        @csrf

        <div class="card" style="padding:10px">



            <div class="fg">

                <label for="title">Your Post Title</label>

                <input type="text" name="title">

            </div>

            <div class="fg">



                <textarea name="body" id="" cols="30" rows="10" placeholder="What's on your mind...">

                </textarea>

            </div>

            <input class="submit" type="submit" value="submit">

        </div>




    </form>


</div>






@endsection