<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Basic Form</title>


    <link href="{{asset('frontend_resources/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend_resources/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('frontend_resources/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('frontend_resources/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontend_resources/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('frontend_resources/css/style.css')}}" rel="stylesheet">

    <link href="{{asset('frontend_resources/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">

    @vite(['resources/js/tinymce.js'])

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
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
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
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="img/a7.jpg">
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
                                        <img alt="image" class="img-circle" src="img/a4.jpg">
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
                                        <img alt="image" class="img-circle" src="img/profile.jpg">
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
                        <a href="login.html">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Basic Form</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a>Forms</a>
                    </li>
                    <li class="active">
                        <strong>Basic Form</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>All form elements <small>With custom checbox and radion elements.</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form method="post" class="form-horizontal" role="form" action="{{route('editBlogsRequest')}}">
                                @csrf
                                <input type="text" name="id" value="{{$blog->id}}"  hidden="true">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" class="form-control" placeholder="Enter your title" value="{{$blog->title}}">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Content</label>
                                    <textarea id="tinymce" name="content" ></textarea>
                                </div>
{{--                                <div class="hr-line-dashed"></div>--}}
{{--                                <div class="form-group"><label class="col-sm-2 control-label">Category <br/>--}}
{{--                                        <small class="text-navy">Identify your post's category</small></label>--}}

{{--                                    <div class="col-sm-10">--}}
{{--                                        <div><label> <input type="radio" checked="" value="book" id="optionsRadios1" name="postCat" onchange="hideAuthor()"> Books </label></div>--}}
{{--                                        <div><label> <input type="radio" value="blog" id="optionsRadios2" name="postCat" onchange="hideAuthor()"> Blogs </label></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="hr-line-dashed"></div>--}}
{{--                                <div class="form-group" id="author" >--}}
{{--                                    <label class="col-sm-2 control-label">Authors</label>--}}
{{--                                    <div class="col-sm-10">--}}
{{--                                        <div class="col-lg-4 m-l-n">--}}
{{--                                            <select class="form-control" name="author">--}}
{{--                                                @foreach($authors as $author)--}}
{{--                                                    @if($author->id == $blog->author_id)--}}
{{--                                                        <option value="{{$author->id}}" id="authors_options" selected="true" >{{$author->name}}</option>--}}
{{--                                                    @else--}}
{{--                                                        <option value="{{$author->id}}" id="authors_options">{{$author->name}}</option>--}}
{{--                                                    @endif--}}
{{--                                                @endforeach--}}
{{--                                            </select></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="submit">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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


<!-- Mainly scripts -->
<script src="frontend_resources/js/jquery-3.1.1.min.js"></script>
<script src="frontend_resources/js/bootstrap.min.js"></script>
<script src="frontend_resources/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="frontend_resources/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script>
    function searchFunction() {
        let input = document.getElementById("search").toLowerCase();
        let items = document.querySelectorAll("#bookList li");

        items.forEach(item => {
            let text = item.textContent.toLowerCase();
            item.style.display = text.includes(input) ? "" : "none";
        });
    }

    window.onload = function() {
        tinymce.activeEditor.setContent("{!! $blog->content !!}"
        );
    };

    function hideAuthor(){
        document.getElementById("author").style.display = (document.getElementById("author").style.display == "none") ? "" : "none";
    }
</script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
</body>

</html>
