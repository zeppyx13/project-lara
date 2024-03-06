@extends('layout.main')
@section('css-post-single')
    <link rel="stylesheet" href="css/post-main.css">
@endsection
@section('container')
    <h1>Posts</h1>
    @if ($posts->count())
        <div class="card mb-3">
            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->catagory->name }}" class="card-img-top"
                alt="{{ $posts[0]->catagory->name }}">
            <div class="card-body text-center">
                <a class="judul" href="posts/{{ $posts[0]->slug }}">
                    <h3 class="card-title">{{ $posts[0]->title }}</h3>
                </a>
                <h5>BY: <a style="color: rgb(0, 8, 255);"
                        href="authors/{{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> in <a
                        style="color: rgb(0, 8, 255);"
                        href="/katagory/{{ $posts[0]->catagory->slug }}">{{ $posts[0]->catagory->name }}</a>
                </h5>
                <p class="card-text">{!! $posts[0]->excerpt !!}</p>
                <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary">read More</a>
                <p class="card-text"><small class="text-muted">{{ $posts[0]->created_at->diffForHumans() }}</small></p>
            </div>
        </div>
    @else
        <p class="text-center fs-4">Tidak ada Postingan</p>
    @endif
    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-4">
                    <div class="position-absolute bg-dark px-3 py-2 text-white" style="z-index: 5;">
                        {{ $post->catagory->name }}
                    </div>
                    <div class="card mb-3">
                        <img src="https://source.unsplash.com/500x400?{{ $post->catagory->name }}" class="card-img-top"
                            alt="{{ $post->catagory->name }}">
                        <div class="card-body">
                            <a class="judul" href="posts/{{ $post->slug }}">
                                <h3 class="card-title">{{ $post->title }}</h3>
                            </a>
                            <h5>BY: <a style="color: rgb(0, 8, 255);"
                                    href="authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in
                                <a style="color: rgb(0, 8, 255);"
                                    href="/katagory/{{ $post->catagory->slug }}">{{ $post->catagory->name }}</a>
                            </h5>
                            <p class="card-text">{!! $post->excerpt !!}</p>
                            <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Go somewhere</a>
                            <p class="card-text mt-4"><small
                                    class="text-muted">{{ $posts[0]->created_at->diffForHumans() }}</small>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
