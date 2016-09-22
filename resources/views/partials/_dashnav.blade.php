
<header >
    <nav class="uk-navbar uk-navbar-attached" id="nav" >
        <div class="uk-navbar-brand">
            <a class="uk-navbar-toggle  uk-hidden-small" data-uk-offcanvas="{target:'#offcanvas-1'}"></a>
            <span>Dashboard</span>
            <span class="arrow"><i class="uk-icon-chevron-right"></i></span>Admin
        </div>
        <ul class="uk-navbar-nav">
            <li class="uk-parent" data-uk-dropdown="{mode:'click'}">
                <a class="uk-active nav-enlarge" href="#"><span>Add New</span><i class="uk-icon-plus-circle"></i></a>

                <div class="uk-dropdown uk-dropdown-navbar">
                    <ul class="uk-nav uk-nav-navbar">
                        <li><a href="{{route('post.create')}}">Post</a></li>
                        <li class="uk-nav-divider"></li>
                        <li><a href="media-new.html">Media</a></li>
                        <li class="uk-nav-divider"></li>
                        <li><a href="user-new.html">User</a></li>
                        <li class="uk-nav-divider"></li>
                    </ul>
                </div>

            </li>
        </ul>

        <div class="uk-navbar-flip icon-space" id="my-id">

            <ul class="uk-navbar-nav">
                <li class="uk-parent" data-uk-dropdown="{justify:'#my-id'}">
                    <a href="#">Howdy ,<b> {{ Auth::user()->email }}</b></a>

                    <div class="uk-dropdown uk-dropdown-navbar">
                        <ul class="uk-nav uk-nav-navbar">
                            <li><a href="#"><i class="uk-icon-gear"></i>Settings</a></li>
                            <li><a href="{{route('profile.create')}}"><i class="uk-icon-user"></i>Profile</a></li>
                            <li class="uk-nav-divider"></li>
                            <li><a href="{{ url('/logout') }}"><i class="uk-icon-sign-out"></i>Logout</a></li>
                        </ul>
                    </div>

                </li>
            </ul>

        </div>

    </nav>
    <div id="offcanvas-1" class="uk-offcanvas">

        <div class="uk-offcanvas-bar">

            <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav>

                <li class="uk-parent">
                    <a href="#"><i class="uk-icon-dashboard space"></i>Dashboard</a>

                    <ul class="uk-nav-sub">
                        <li><a href="{{route('dashboard')}}"><i class="uk-icon-globe space"></i>Admin Dashboard</a></li>
                        <li><a href="/"><i class="uk-icon-globe space"></i>Site</a></li>
                    </ul>
                </li>
                <li class="uk-parent">
                    <a href="#"><i class="uk-icon-thumb-tack space"></i>Posts</a>
                    <ul class="uk-nav-sub">
                        <li><a href="{{route('dashboard')}}">All Posts</a></li>
                        <li><a href="{{route('post.create')}}">Add New</a></li>
                        <li><a href="{{route('categories.index')}}">Add Categories</a></li>
                        <li><a href="tags.html">Tags</a></li>
                    </ul>
                </li>
                <li class="uk-parent">
                    <a href="#"><i class="uk-icon-video-camera space"></i>Media</a>
                    <ul class="uk-nav-sub">
                        <li><a href="media.html">Library</a></li>
                        <li><a href="media-new.html">Add New</a></li>
                    </ul>
                </li>
                <li class="uk-parent">
                    <a href="#"><i class="uk-icon-users space"></i>Users</a>
                    <ul class="uk-nav-sub">
                        <li><a href="users.html">All Users</a></li>
                        <li><a href="user-ne
                        w.html">Add New</a></li>
                        <li><a href="{{route('profile.create')}}">Your Profile</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>

</header>
