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
                @if ($posts->images)
                    <img class="img-fluid" src="{{ asset('storage/' . $posts->images) }}" class="card-img-top"
                        alt="{{ $posts->catagory->name }}">
                @else
                    <img class="img-fluid" src="https://source.unsplash.com/1200x400?{{ $posts->catagory->name }}"
                        class="card-img-top" alt="{{ $posts->catagory->name }}">
                @endif
                <article class="my-3 fs-5">
                    {!! $posts->body !!}
                </article>
                <div class="btn d-flex justify-content-end" style="gap: 5px">
                    <a href="/dashboard/posts"><button class="btn btn-primary rounded"><span
                                data-feather="corner-down-left"></span>
                            Back</button></a>
                    <button class="btn btn-warning rounded"><span data-feather="edit"></span> Edit</button>
                    <form action="/dashboard/posts/{{ $posts->id }}" method="Post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger rounded" onclick="return confirm('Are You sure to delete')"><span
                                data-feather="trash-2"></span> Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
