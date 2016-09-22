<header>

    <nav class="uk-navbar uk-navbar-attached" id="navblog" data-uk-sticky>
        <div class="uk-navbar-brand">
            <a class="uk-navbar-toggle  uk-hidden-small" data-uk-offcanvas="{target:'#offcanvas-1'}"></a>
            <span><a href="{{route('blog')}}">Auxylopstudios Blog</a></span>

        </div>

        <div class="uk-navbar-flip">

            <div class="uk-navbar-content">
                <form class="uk-search"
                      data-uk-search="{flipDropdown:true, source:'../tests/components/_searchautocomplete.json'}">
                    <input class="uk-search-field" type="search" placeholder="search...">
                </form>
            </div>

        </div>


    </nav>
    <div id="offcanvas-1" class="uk-offcanvas">

        <div class="uk-offcanvas-bar">

            <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav>


                <li class="uk-parent">
                    <a href="#"><i class="uk-icon-dashboard space"></i>Dashboard</a>

                    <ul class="uk-nav-sub">
                        <li><a href="{{route('dashboard')}}"><i class="uk-icon-globe space"></i>Admin Dashboard</a></li>
                        <li><a href="{{route('blog')}}"><i class="uk-icon-globe space"></i>Site</a></li>
                    </ul>
                </li>
                <li class="uk-parent">
                    <a href="#"><i class="uk-icon-thumb-tack space"></i>Posts</a>
                    <ul class="uk-nav-sub">
                        <li><a href="post.html">All Posts</a></li>
                        <li><a href="post-new.html">Add New</a></li>
                        <li><a href="category.html">Categories</a></li>
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
                        <li><a href="user-new.html">Add New</a></li>
                        <li><a href="profile.html">Your Profile</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>

</header>