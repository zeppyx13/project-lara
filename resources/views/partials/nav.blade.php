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
                    <a class="nav-link {{ $status1 }}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $status2 }}" href="/blog">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/list-category/">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $status3 }}" href="/about">About</a>
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color: rgba(255, 0, 0, 0.713)" href="#"
                            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <strong><i class="bi bi-person-fill"></i> Hai,</strong>{{ auth()->user()->username }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-house-door"></i> DashBoard</a>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Account Setiing</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button class="dropdown-item">
                                        <i class="bi bi-power"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-secondary rounded ms-3 p-2 fs-5" href="/Login"><i
                                class="bi bi-door-open"></i><strong> Login</strong></a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
