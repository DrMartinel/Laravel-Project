    <nav class="navbar-default navbar-static-side" role="navigation" style="position: fixed">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="{{ asset('img/profile_small.jpg') }}" />
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong
                                        class="font-bold">{{ auth()->user()->name }}</strong>
                                </span> <span class="text-muted text-xs block"><a href="{{ route('profile') }}"> Your
                                        profile </a> <b class="caret"></b></span> </span> </a>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                    <a id="newPostsComponent"><i class="fa fa-plus"></i> <span class="nav-label">New Posts</span></a>
                <li>
                    <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">All Posts</span> <span
                            class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a id="allBooksComponent">Books</a></li>
                        <li><a id="allBlogsComponent">Blogs</a></li>
                    </ul>
                </li>
                <li>
                    <a href="index.html"><i class="fa fa-diamond"></i></i> <span class="nav-label">My Posts</span> <span
                            class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a id="myBooksComponent">Books</a></li>
                        <li><a id="myBlogsComponent">Blogs</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <script>
        document.getElementById('newPostsComponent').addEventListener('click', () => {
            Livewire.dispatch('showPosts', {
                category: 'newPosts',
                typeOfPage: 'addItemPage'
            });
        });
        document.getElementById('allBooksComponent').addEventListener('click', () => {
            Livewire.dispatch('showPosts', {
                category: 'allBooks',
                typeOfPage: 'listingPage'
            });
        });
        document.getElementById('allBlogsComponent').addEventListener('click', () => {
            Livewire.dispatch('showPosts', {
                category: 'allBlogs',
                typeOfPage: 'listingPage'
            });
        });
        document.getElementById('myBooksComponent').addEventListener('click', () => {
            Livewire.dispatch('showPosts', {
                category: 'myBooks',
                typeOfPage: 'listingPage'
            });
        });
        document.getElementById('myBlogsComponent').addEventListener('click', () => {
            Livewire.dispatch('showPosts', {
                category: 'myBlogs',
                typeOfPage: 'listingPage'
            });
        });
    </script>
