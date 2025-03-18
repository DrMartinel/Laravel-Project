<!DOCTYPE html>
@extends('vendor.layouts.app')
@section('headline')
    @php
        $headline = (isset($userBooks)) ? "My Books" : "My Blogs";
        $searchPage = false;
    @endphp
    @include('vendor.partials.headline',compact('headline','searchPage'))
@endsection
@section('content')
@section('content')
        <div class="row">
            @if(isset($userBooks))
                <div class="wrapper wrapper-content animated fadeInRight" id="booksContainer">
                    @php
                        $userItems = $userBooks
                    @endphp
                    @include('vendor.partials.show-posts', compact('userItems'))
                </div>
            @else
                <div class="wrapper wrapper-content animated fadeInRight" id="blogsContainer">
                    @php
                        $userItems = $userBlogs
                    @endphp
                    @include('vendor.partials.show-posts',compact('userItems'))
                </div>
            @endif
        </div>
@endsection
<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="frontend_resources/js/bootstrap.min.js"></script>
<script src="frontend_resources/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="frontend_resources/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

</body>

</html>
