@extends('dashboard.layout.main')
@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Posts</h1>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Yeeay!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('delete'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Yeeay!</strong> {{ session('delete') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="table-responsive col-lg-8">
            <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Add New posts</a>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->catagory->name }}</td>
                            <td class="d-flex justify-content-center flex-fill" style="gap: 10px;">
                                <a href="/dashboard/posts/{{ $item->slug }}">
                                    <button class="btn btn-info rounded border-0 btn-sm"><span data-feather="eye"></span>
                                        Show</button>
                                </a>
                                <a href="/dashboard/posts/{{ $item->slug }}/edit">
                                    <button class="btn btn-warning rounded border-0 btn-sm"><span
                                            data-feather="edit"></span>
                                        Edit</button>
                                </a>
                                <form action="/dashboard/posts/{{ $item->id }}" method="Post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger rounded border-0 btn-sm"
                                        onclick="return confirm('Are You sure to delete')"><span
                                            data-feather="trash-2"></span>
                                        Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
