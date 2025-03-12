@extends('vendor.layouts.app')
@section('content')
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
                                    @if($book->uploader->id == $userId)
                                        <div class="ibox-tools">
                                            <a class="collapse-link removeItem" href="{{route("deleteBooksRequest",$book->id)}}">
                                                <i class="fa fa-remove"></i>
                                            </a>
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="{{ route('editBooks', $book) }}">
                                                <i class="fa fa-wrench"></i>
                                            </a>
                                        </div>
                                    @endif

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
                                    @if($blog->uploader->id == $userId)
                                    <div class="ibox-tools">
                                        <a class="collapse-link removeItem" href="{{route("deleteBlogsRequest",$blog->id)}}">
                                            <i class="fa fa-remove removeItem"></i>
                                        </a>
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="{{ route('editBlogs', $blog) }}" id="editPosts">
                                            <i class="fa fa-wrench"></i>
                                        </a>
                                    </div>
                                    @endif
                                </div>
                        @endforeach
                            {{ $userBlogs->appends(['books' => request('books')])->links('pagination::default') }}
                    </div>
                </div>
            </div>
        </div>
@endsection

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
            document.getElementById("Blogs/Books").innerText("Type: Books");
        }else {
            document.getElementById("booksContainer").setAttribute("hidden","true");
            document.getElementById("blogsContainer").removeAttribute("hidden");
            document.getElementById("Blogs/Books").innerText("Type: Blogs");
        }
    });

    Array.from(document.getElementsByClassName('removeItem')).forEach(item => {
        item.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior

            // Custom confirmation dialog (can be styled)
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
