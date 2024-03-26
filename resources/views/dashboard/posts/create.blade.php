@extends('dashboard.layout.main')
@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create</h1>
        </div>
        <div class="col-lg-8">
            <form method="Post" action="/dashboard/posts" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text"
                        class="form-control @error('title')
                        is-invalid
                    @enderror"
                        id="title" name="title" aria-describedby="title" required autocomplete="off"
                        value="{{ old('title') }}">
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
                        value="{{ old('slug') }}">
                    @error('slug')
                        <div id="slug" class="form-text invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category :</label>
                    <select class="form-select" id="category" name="catagory_id">
                        @foreach ($category as $items)
                            @if (old('catagory_id') == $items->id)
                                <option value="{{ $items->id }}" selected>{{ $items->name }}</option>
                            @else
                                <option value="{{ $items->id }}">{{ $items->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Post Image</label>
                    <img alt="" class="img-preview img-fluid mb-3 col-4">
                    <input
                        class="form-control img @error('images')
                    is-invalid
                    @enderror"
                        type="file" id="formFile" name="images" aria-describedby="formFile" onchange="prev()">
                    @error('images')
                        <div id="formFile" class="form-text invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">body :</label>
                    @error('body')
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Holy guacamole!</strong> {{ $message }}.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror
                    <input id="body" type="hidden" name="body" required value="{{ old('body') }}">
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
    <script>
        function prev() {
            const img = document.querySelector('.img');
            const imgprev = document.querySelector('.img-preview');
            const images = document.getElementById('formFile'); // tambahkan ini untuk mendapatkan elemen input gambar

            imgprev.style.display = 'block';
            const oFReader = new FileReader();

            oFReader.readAsDataURL(images.files[0]); // perbaiki penamaan variabel dari "images" menjadi "img"

            oFReader.onload = function(oFREvent) {
                imgprev.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
