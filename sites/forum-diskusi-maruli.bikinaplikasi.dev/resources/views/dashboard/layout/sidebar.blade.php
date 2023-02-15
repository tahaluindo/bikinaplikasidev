<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page"
                   href="{{ url('dashboard') }}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::is('dashboard/posts*') ? 'active' : '' }}"
                   href="{{ url('dashboard/posts') }}">
                    <span data-feather="file-text"></span>
                    My Posts
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link"
                   href="https://docs.google.com/forms/d/e/1FAIpQLSfvHh_ErfEm_EHmjjeSLLwwRc2X96omUQ8c-tBKBVbSCdW3pQ/viewform?usp=sf_link" target="_blank">
                    <span data-feather="file-text"></span>
                    Link Google Form
                </a>
            </li>
        </ul>
        @can('admin')
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Administrator</span>
            </h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{Request::is('dashboard/categories*') ? 'active' : '' }}"
                       href="{{ url('dashboard/categories') }}" >
                        <span data-feather="grid"></span>
                        Post Categories
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{Request::is('dashboard/user*') ? 'active' : '' }}"
                       href="{{ url('dashboard/user') }}" >
                        <span data-feather="grid"></span>
                        User
                    </a>
                </li>
            </ul>
        @endcan
    </div>
</nav>
