<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BookVerse | Your Posts</title>

    <link href="frontend_resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="frontend_resources/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="frontend_resources/css/animate.css" rel="stylesheet">
    <link href="frontend_resources/css/style.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="frontend_resources/img/profile_small.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                    <a href="{{route('newPosts')}}"><i class="fa fa-plus"></i> <span class="nav-label">New Posts</span></a>
                </li>
                <li>
                    <a href="{{route('allPosts')}}"><i class="fa fa-book"></i> <span class="nav-label">All Posts</span></a>
                </li>
                <li>
                    <a href="{{route('mainpage')}}"><i class="fa fa-diamond"></i> <span class="nav-label">My Posts</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" action="{{route("searchPosts")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="search" id="search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="frontend_resources/img/a7.jpg">
                                    </a>
                                    <div class="media-body">
                                        <small class="pull-right">46h ago</small>
                                        <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                        <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="frontend_resources/img/a4.jpg">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right text-navy">5h ago</small>
                                        <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                        <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="frontend_resources/img/profile.jpg">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right">23h ago</small>
                                        <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                        <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="mailbox.html">
                                        <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="mailbox.html">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="profile.html">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="grid_options.html">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="notifications.html">
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="{{route('logout')}}">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>My Posts</h2>
                <ol class="breadcrumb">
                    <li class="active">
{{--                        <button class="btn btn-primary" id="Blogs/Books">Category</button>--}}
                    </li>
                </ol>
            </div>
        </div>
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight" id="booksContainer">
                    <div class="ibox-content forum-post-container">
                            @foreach($userBooks as $book)
                                    <div class="forum-post-info">
                                        <h4><span class="text-navy"><i class="fa fa-globe"></i> Your books</span> -  <span class="text-muted">Free talks</span></h4>
                                    </div>
                                    <div class="media">
                                        <a class="forum-avatar" href="#">
                                            <img src="frontend_resources/img/a1.jpg" class="img-circle" alt="image">
                                            <div class="author-info">
                                                <strong>Posts:</strong> 542<br/>
                                                <strong>Joined:</strong> April 11.2015<br/>
                                            </div>
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">{{ $book->title }}</h4>
                                            <h4 class="media-heading">{!! $book->content  !!}</h4>
                                            - Uploaded by {{$book->uploader->name}}
                                            <br>
                                            - Written by {{$book->author->name}}
                                        </div>
                                        <div class="ibox-tools">
                                            <a class="collapse-link removeItem" href="{{route("deleteBooksRequest",$book->id)}}">
                                                <i class="fa fa-remove"></i>
                                            </a>
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="{{ route('editBooks', $book) }}">
                                                <i class="fa fa-wrench"></i>
                                            </a>
                                        </div>
                                    </div>
                            @endforeach
                        {{ $userBooks->appends(['blogs' => request('blogs')])->links('pagination::default') }}
                    </div>
                </div>
                <div class="wrapper wrapper-content animated fadeInRight" id="blogsContainer">
                    <div class="ibox-content forum-post-container">
                        @foreach($userBlogs as $blog)
                                <div class="forum-post-info">
                                    <h4><span class="text-navy"><i class="fa fa-globe"></i> Your blogs</span> -  <span class="text-muted">Free talks</span></h4>
                                </div>
                                <div class="media">
                                    <a class="forum-avatar" href="#">
                                        <img src="frontend_resources/img/a1.jpg" class="img-circle" alt="image">
                                        <div class="author-info">
                                            <strong>Posts:</strong> 542<br/>
                                            <strong>Joined:</strong> April 11.2015<br/>
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{ $blog->title }}</h4>
                                        <h4 class="media-heading">{!! $blog->content  !!}</h4>
                                        - Uploaded by {{$blog->uploader->name}}
                                    </div>
                                    <div class="ibox-tools">
                                        <a class="collapse-link removeItem" href="{{route("deleteBlogsRequest",$blog->id)}}">
                                            <i class="fa fa-remove removeItem"></i>
                                        </a>
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="{{ route('editBlogs', $blog) }}" id="editPosts">
                                            <i class="fa fa-wrench"></i>
                                        </a>
                                    </div>
                                </div>
                        @endforeach
                            {{ $userBlogs->appends(['books' => request('books')])->links('pagination::default') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2017
            </div>
        </div>

    </div>
</div>

<style>
    .noti-box{
        opacity: 0;
        transition: opacity 1s ease-out;
    }
</style>
<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="frontend_resources/js/bootstrap.min.js"></script>
<script src="frontend_resources/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="frontend_resources/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script>
    document.getElementById("Blogs/Books").addEventListener("click",() => {
        if(document.getElementById("booksContainer").hasAttribute("hidden")){
            document.getElementById("booksContainer").removeAttribute("hidden");
            document.getElementById("blogsContainer").setAttribute("hidden","true");
        }else {
            document.getElementById("booksContainer").setAttribute("hidden","true");
            document.getElementById("blogsContainer").removeAttribute("hidden");
        }
    });

    Array.from(document.getElementsByClassName('removeItem')).forEach(item => {
        item.addEventListener('click', function(event) {
            event.preventDefault();

            const confirmDialog = document.createElement('div');
            confirmDialog.innerHTML = `
                <div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);
                            background: white; border: 2px solid black; padding: 20px;
                            text-align: center; z-index: 1000;">
                    <p>You are about to delete this post, are you sure?</p>
                    <button id="confirmBtn">Yes</button>
                    <button id="cancelBtn">Cancel</button>
                </div>
            `;
            document.body.appendChild(confirmDialog);

            const confirmBtn = confirmDialog.querySelector('#confirmBtn');
            const cancelBtn = confirmDialog.querySelector('#cancelBtn');

            confirmBtn.addEventListener('click', () => {
                window.location.href = this.href;
            });

            cancelBtn.addEventListener('click', () => {
                document.body.removeChild(confirmDialog);
            });
        });
    });

</script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

</body>

</html>
