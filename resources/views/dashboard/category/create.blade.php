@extends('dashboard.layout.main')
@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create Category</h1>
        </div>
        <div class="col-lg-8">
            <form method="Post" action="/dashboard/category">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text"
                        class="form-control @error('name')
                        is-invalid
                    @enderror"
                        id="name" name="name" aria-describedby="name" required autocomplete="off"
                        value="{{ old('name') }}">
                    @error('name')
                        <div id="name" class="form-text invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" readonly
                        class="form-control @error('slug')
                    is-invalid
                    @enderror"
                        id="slug" name="slug" aria-describedby="slug" required autocomplete="off"
                        value="{{ old('slug') }}">
                    @error('slug')
                        <div id="slug" class="form-text invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create Category</button>
            </form>
        </div>
    </main>
    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener("keyup", function() {
            let preslug = name.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });
    </script>
@endsection
