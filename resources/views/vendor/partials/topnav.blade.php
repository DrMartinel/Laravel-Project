    <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <div class="col-lg-3" style="position: absolute">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Search For Something?</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-down" id="show-button"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content" id="ibox-content" hidden="true">
                            <form class="form-horizontal" action="{{route("searchPosts")}}" method="post">
                                @csrf
                                <p>Enter your keyword and category</p>
                                <div class="form-group" id="search-area">
                                    <label class="col-lg-2 control-label">Keyword</label>
                                    <div class="col-lg-10">
                                        <input type="text" placeholder="Enter your keyword" class="form-control" name="keyword">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-2 control-label">Category</label>
                                    <div class="col-lg-10">
                                        <select class="form-control m-b" name="category">
                                            <option value="book">Books</option>
                                            <option value="blog">Blogs</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-sm btn-white" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
{{--                <form role="search" class="navbar-form-custom" action="{{route("searchPosts")}}" method="post">--}}
{{--                    @csrf--}}
{{--                    <div class="form-group">--}}
{{--                        <input type="text" placeholder="Search for something..." class="form-control" name="search" id="search">--}}
{{--                    </div>--}}
{{--                </form>--}}
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="{{route('logout')}}">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <script>
        document.getElementById('show-button').addEventListener('click',() => {
            document.getElementById('ibox-content').style.hidden = "";
        })
    </script>

