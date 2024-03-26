<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ $status === 'Home' ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $status === 'Posts' ? 'active' : '' }}" href="/dashboard/posts">
                    <span data-feather="file" class="align-text-bottom"></span>
                    All Posts
                </a>
            </li>
        </ul>

        @can('Admin')
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Administrator</span>
            </h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/category*') ? 'active' : '' }}" aria-current="page"
                        href="/dashboard/category">
                        <span data-feather="grid" class="align-text-bottom"></span>
                        category
                    </a>
                </li>
            </ul>
        @endcan
    </div>
</nav>
