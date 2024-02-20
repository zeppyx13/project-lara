@extends('layout.polos')
@section('css-post')
    <link rel="stylesheet" href="../css/post-main.css">
@endsection
@section('container')
    <article class="mb-5">
        <h2>
            {{ $Post['title'] }}
        </h2>
        <h5>BY:{{ $Post['author'] }} </h5>
        <p>{{ $Post['body'] }} </p>
    </article>
    <a style="color: black" href="/blog">Back</a>
@endsection
