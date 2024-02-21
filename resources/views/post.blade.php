@extends('layout.polos')
@section('css-post')
    <link rel="stylesheet" href="../css/post-main.css">
@endsection
@section('container')
    <article class="mb-5">
        <h2>
            {{ $Post->title }}
        </h2>
        <h5>BY:{{ $Post->author->name }} </h5>
        <h5><a style="color: black" href="/katagory/{{ $Post->catagory->slug }}">{{ $Post->catagory->name }}</a></h5>
        <p>{!! $Post->body !!} </p>
    </article>
    <a style="color: black" href="/blog">Back</a>
@endsection
