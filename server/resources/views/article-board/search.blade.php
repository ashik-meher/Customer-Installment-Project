@extends('layouts.app')

@section('content')

@if($articles->count() > 0)

<p>We Got {{$articles->count()}} articles </p>


@foreach($articles as $article)

<p>{{$article->title}}</p>
<p>{{$article->body}}</p>

<hr>

@endforeach

@else

<p>No Articles Found</p>

@endif


@endsection