<nav class="navbar navbar-dark navbar-expand-lg bg-transparant">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Gu-Blog</a>
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
            </ul>
            <?php
                if ($status1 !== 'active' AND $status3 !== 'active' OR $status2 == 'active'){
            ?>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            </form>
            <?php
                }
            ?>
        </div>
    </div>
</nav>
