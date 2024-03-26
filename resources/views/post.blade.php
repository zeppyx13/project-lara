@extends('layout.polos')
@section('css-post')
    <link rel="stylesheet" href="../css/post-main.css">
@endsection
@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h2>
                    {{ $Post->title }}
                </h2>
                <h5>BY:<a style="color: black" href="/blog?author={{ $Post->author->name }}">{{ $Post->author->name }}</a>
                </h5>
                <h5><a style="color: black" href="/blog?category={{ $Post->catagory->slug }}">{{ $Post->catagory->name }}</a>
                </h5>
                @if ($Post->images)
                    <img class="img-fluid" src="{{ '../storage/' . $Post->images }}" class="card-img-top"
                        alt="{{ $Post->catagory->name }}">
                @else
                    <img class="img-fluid" src="https://source.unsplash.com/1200x400?{{ $Post->catagory->name }}"
                        class="card-img-top" alt="{{ $Post->catagory->name }}">
                @endif

                <article class="my-3 fs-5">
                    {!! $Post->body !!}
                </article>
                <a style="color: rgb(255, 0, 0)" href="/blog">Back</a>
            </div>
        </div>
    </div>
@endsection
