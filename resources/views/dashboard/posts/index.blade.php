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
                            <td class="d-flex justify-content-center">
                                <a href="/dashboard/posts/{{ $item->slug }}" class="btn btn-info m-1">
                                    <span data-feather="eye"></span>
                                </a>
                                <a href="/dashbord/posts/{{ $item->id }}" class="btn btn-warning m-1">
                                    <span data-feather="edit"></span>
                                </a>
                                <a href="/dashbord/posts/{{ $item->id }}" class="btn btn-danger m-1">
                                    <span data-feather="trash-2"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
