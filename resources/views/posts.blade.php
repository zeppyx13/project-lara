@extends('layout.main')
@section('css-post-single')
    <link rel="stylesheet" href="css/post-main.css">
@endsection
@section('container')
    <h1>Posts</h1>
    @foreach ($posts as $post)
        <article class="mb-5 border-bottom pb-4">
            <h2>
                <a class="judul" href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
            </h2>
            <h5><a style="color: black;" href="/katagory/{{ $post->catagory->slug }}">{{ $post->catagory->name }}</a></h5>
            <h5>BY: <a style="color: black;" href="authors/{{ $post->author->username }}">{{ $post->author->name }}</a></h5>
            <p>{!! $post->excerpt !!} </p>
            <a style="color: rgb(0, 76, 255);" href="/posts/{{ $post->slug }}">Read More</a>
        </article>
    @endforeach
@endsection
