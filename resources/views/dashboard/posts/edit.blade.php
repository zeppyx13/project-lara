@extends('dashboard.layout.main')
@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Update Post</h1>
        </div>
        <div class="col-lg-8">
            <form method="Post" action="/dashboard/posts/{{ $posts->title }}">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text"
                        class="form-control @error('title')
                        is-invalid
                    @enderror"
                        id="title" name="title" aria-describedby="title" required autocomplete="off"
                        value="{{ old('title', $posts->title) }}">
                    @error('title')
                        <div id="title" class="form-text invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" readonly
                        class="form-control @error('slug')
                    is-invalid
                    @enderror"
                        id="slug" name="slug" aria-describedby="slug" required autocomplete="off"
                        value="{{ old('slug', $posts->slug) }}">
                    @error('slug')
                        <div id="slug" class="form-text invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category :</label>
                    <select class="form-select" id="category" name="catagory_id">
                        @foreach ($category as $items)
                            @if (old('catagory_id', $posts->catagory_id) == $items->id)
                                <option value="{{ $items->id }}" selected>{{ $items->name }}</option>
                            @else
                                <option value="{{ $items->id }}">{{ $items->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">body :</label>
                    @error('body')
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Holy guacamole!</strong> {{ $message }}.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror
                    <input id="body" type="hidden" name="body" required value="{{ old('body', $posts->body) }}">
                    <trix-editor input="body"></trix-editor>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </main>
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener("keyup", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });
    </script>
    <script>
        document.addEventListener('trix-file-accept'function(e) {
            e.preventDefault();
        });
    </script>
@endsection
