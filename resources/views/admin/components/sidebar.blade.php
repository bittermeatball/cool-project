<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
    <div class="main-navbar">
        <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
            <a class="navbar-brand w-100 mr-0" href="{{url('admin')}}" style="line-height: 25px;">
                <div class="d-table m-auto">
                    <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="{{asset('/images/shards-dashboards-logo.svg')}}" alt="Shards Dashboard">
                    <span class="d-none d-md-inline ml-1">Cool Dashboard</span>
                </div>
            </a>
            <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
            </a>
        </nav>
    </div>
    <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
        <div class="input-group input-group-seamless ml-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search">
        </div>
    </form>
    <div class="nav-wrapper">
        <!-- Home section -->
        <h6 class="main-sidebar__nav-title">Home</h6>
        <ul class="nav nav--no-borders flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{url('admin')}}">
                    <i class="material-icons">&#xE917;</i>
                    <span>Analytics</span>
                </a>
            </li>
        </ul>
        <!-- Users manager section -->
        <h6 class="main-sidebar__nav-title">Users manager</h6>
        <ul class="nav nav--no-borders flex-column">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                    <i class="material-icons">&#xE7FD;</i>
                    <span>User Account</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item " href="{{url('admin/users')}}">All users</a>
                    <a class="dropdown-item " href="{{url('admin/add-user')}}">Add Users</a>
                </div>
            </li>
        </ul>
        <!-- Post section -->
        <h6 class="main-sidebar__nav-title">Posts manager</h6>
        <ul class="nav nav--no-borders flex-column">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                    <i class="material-icons">&#xe873;</i>
                    <span>Post</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item " href="{{route('post.index')}}">All posts</a>
                    <a class="dropdown-item " href="{{route('post.create')}}">Add post</a>
                </div>
            </li>
        </ul>
        <h6 class="main-sidebar__nav-title">Specify posts</h6> 
        <!-- Category section -->
        <ul class="nav nav--no-borders flex-column">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                    <i class="material-icons">&#xe8e9;</i>
                    <span>Categories</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item " href="admin/categories">All categories</a>
                    <a class="dropdown-item " href="admin/add-category">Add category</a>
                </div>
            </li>
        </ul>
        <!-- Tags section -->
        <ul class="nav nav--no-borders flex-column">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                    <i class="material-icons">&#xE892;</i>
                    <span>Tags</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item " href="admin/tags">All tags</a>
                    <a class="dropdown-item " href="admin/add-tag">Add tag</a>
                </div>
            </li>
        </ul>
    </div>
</aside>