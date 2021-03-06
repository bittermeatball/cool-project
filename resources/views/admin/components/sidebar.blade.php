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
                    <i class="fas fa-chart-line" style="font-size: 18px"></i>
                    <span>Analytics</span>
                </a>
            </li>
        </ul>
        @if(Auth::user()->role == 'administrator')
        <!-- Images manager section -->
        <ul class="nav nav--no-borders flex-column">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                    <i class="fas fa-image" style="font-size: 18px"></i>
                    <span>Library</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item " href="{{url('ckeditor/ckfinder/ckfinder.html')}}">All images</a>
                </div>
            </li>
        </ul>
        @endif
        <!-- Users manager section -->
        <h6 class="main-sidebar__nav-title">Users manager</h6>
        <ul class="nav nav--no-borders flex-column">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                    <i class="fas fa-user-tie" style="font-size: 18px"></i>
                    <span>User Account</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item " href="{{route('users')}}">All users</a>
                    @if(Auth::user()->role == 'administrator')
                        <a class="dropdown-item " href="{{route('user.create')}}">Add Users</a>
                    @endif
                </div>
            </li>
        </ul>
        <!-- Post section -->
        <h6 class="main-sidebar__nav-title">Posts manager</h6>
        <ul class="nav nav--no-borders flex-column">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                    <i class="fas fa-file-alt" style="font-size: 18px"></i>
                    <span>Post</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item " href="{{route('post.index')}}">All posts</a>
                    @if(Auth::user()->role == 'administrator' || Auth::user()->role == 'editor')
                        <a class="dropdown-item " href="{{route('post.create')}}">Add post</a>
                    @endif
                </div>
            </li>
        </ul>
        <h6 class="main-sidebar__nav-title">Specify posts</h6> 
        <!-- Category section -->
        <ul class="nav nav--no-borders flex-column">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                    <i class="fas fa-th-list" style="font-size: 18px"></i>
                    <span>Categories</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item " href="{{route('category.index')}}">All categories</a>
                    <a class="dropdown-item " href="{{route('category.create')}}">Add category</a>
                </div>
            </li>
        </ul>
        <!-- Tags section -->
        <ul class="nav nav--no-borders flex-column">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                    <i class="fas fa-tags" style="font-size: 18px"></i>
                    <span>Tags</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item " href="{{route('tag.index')}}">All tags</a>
                </div>
            </li>
        </ul>
    </div>
</aside>