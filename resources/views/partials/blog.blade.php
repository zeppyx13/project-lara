<nav class="navbar navbar-dark navbar-expand-lg bg-transparant fs-4">
    <div class="container-fluid">
        <a class="navbar-brand fs-2" href="/">Gu-Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse list-link" id="navbarSupportedContent">
            <ul class="navbar-nav me-2 ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $status === 'Blog' ? 'active' : '' }}" href="/blog">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $status === 'Category' ? 'active' : '' }}" href="/list-category/">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-secondary rounded ms-3 p-2 fs-5" href="/Login"><i
                            class="bi bi-door-open"></i><strong> Login</strong></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
