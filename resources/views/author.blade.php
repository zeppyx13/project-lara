@extends('layout.polos')
@section('katagori')
    <link rel="stylesheet" href="../css/katagori.css">
@endsection
@section('container')
    <h1>{{ $title }} Creataion : </h1>
    @foreach ($posts as $post)
        <article class="mb-5">
            <h2>
                <a class="judul" href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
            </h2>
            <h5>BY:{{ $post->author->name }} </h5>
            <p>{!! $post->excerpt !!} </p>
        </article>
    @endforeach
@endsection
