@extends('layout.main')
@section('css-post-single')
    <link rel="stylesheet" href="css/post-main.css">
@endsection
@section('container')
    <h1>Posts</h1>
    @foreach ($posts as $post)
        <article class="mb-5">
            <h2>
                <a class="judul" href="/posts/{{ $post['slug'] }}">{{ $post['title'] }}</a>
            </h2>
            <h5>BY:{{ $post['author'] }} </h5>
            <p>{{ $post['body'] }} </p>
        </article>
    @endforeach
@endsection
