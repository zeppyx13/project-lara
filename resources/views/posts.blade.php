@extends('layout.polos')
@section('css-post')
    <link rel="stylesheet" href="../css/post-main.css">
@endsection
@section('container')
    <h1 class="mb-3 text-center mt-4">{{ $title }}</h1>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/blog" class="d-flex" role="search">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('authors'))
                    <input type="hidden" name="authors" value="{{ request('authors') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Some Articles"
                        aria-label="Search Some Articles" aria-describedby="button-addon2" name="cari" autocomplete="off"
                        value="{{ request('cari') }}">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2">Search</button>
                </div>
            </form>
        </div>
    </div>
    @if ($posts->count())
        {{-- hero --}}
        <div class="card mb-3">
            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->catagory->name }}" class="card-img-top"
                alt="{{ $posts[0]->catagory->name }}">
            <div class="card-body text-center">
                <a class="judul" href="posts/{{ $posts[0]->slug }}">
                    <h3 class="card-title">{{ $posts[0]->title }}</h3>
                </a>
                <h5>BY: <a style="color: rgb(0, 8, 255);"
                        href="/blog?authors={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> in <a
                        style="color: rgb(0, 8, 255);"
                        href="/blog?category={{ $posts[0]->catagory->slug }}">{{ $posts[0]->catagory->name }}</a>
                </h5>
                <p class="card-text">{!! $posts[0]->excerpt !!}</p>
                <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary">read More</a>
                <p class="card-text"><small class="text-muted">{{ $posts[0]->created_at->diffForHumans() }}</small></p>
            </div>
        </div>
        {{ $posts->links() }}
        {{-- isi --}}
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
                                        href="/blog?authors={{ $post->author->username }}">{{ $post->author->name }}</a>
                                    in
                                    <a style="color: rgb(0, 8, 255);"
                                        href="/blog?category={{ $posts[0]->catagory->slug }}">{{ $post->catagory->name }}</a>
                                </h5>
                                <p class="card-text">{!! $post->excerpt !!}</p>
                                <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                                <p class="card-text mt-4"><small
                                        class="text-muted">{{ $posts[0]->created_at->diffForHumans() }}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">Tidak ada Postingan</p>
    @endif
@endsection
