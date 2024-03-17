@extends('dashboard.layout.main')
@section('container')
    <div class="container">
        <div class="row d-flex justify-content-center m-5">
            <div class="col-md-7">
                <h2>
                    {{ $posts->title }}
                </h2>
                <h5>BY:<a style="color: black" href="/blog?author={{ $posts->author->name }}">{{ $posts->author->name }}</a>
                </h5>
                <h5><a style="color: black"
                        href="/blog?category={{ $posts->catagory->slug }}">{{ $posts->catagory->name }}</a>
                </h5>
                <img class="img-fluid" src="https://source.unsplash.com/1200x400?{{ $posts->catagory->name }}"
                    class="card-img-top" alt="{{ $posts->catagory->name }}">
                <article class="my-3 fs-5">
                    {!! $posts->body !!}
                </article>
                <a style="color: rgb(255, 0, 0)" href="/blog">Back</a>
            </div>
        </div>
    </div>
@endsection
