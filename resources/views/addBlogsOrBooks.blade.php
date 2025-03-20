<!DOCTYPE html>
@extends('vendor.layouts.app')
    @section('content')
        @include('vendor.partials.post-controlling-headline')
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add new posts <small>Have fun</small></h5>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" role="form" action="{{route('addPosts')}}">
                                @csrf
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" class="form-control" placeholder="Enter your title">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Content</label>
                                    <textarea id="tinymce" name="content"></textarea>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Category <br/>
                                        <small class="text-navy">Identify your post's category</small></label>

                                    <div class="col-sm-10">
                                        <div><label> <input type="radio" checked="" value="book" id="optionsRadios1" name="category" onchange="showAuthor()"> Books </label></div>
                                        <div><label> <input type="radio" value="blog" id="optionsRadios2" name="category" onchange="hideAuthor()"> Blogs </label></div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group" id="author" >
                                    <label class="col-sm-2 control-label">Authors</label>
                                    <div class="col-sm-10">
                                        <div class="col-lg-4 m-l-n">
                                            <select class="form-control" name="author">
                                                @foreach($authors as $author)
                                                    <option value="{{$author->id}}">{{$author->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

<script>
    function hideAuthor(){
        document.getElementById("author").style.display = "none";
    }

    function showAuthor(){
        document.getElementById("author").style.display = "";
    }
</script>

