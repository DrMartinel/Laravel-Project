<!DOCTYPE html>
@extends('vendor.layouts.app')
@section('content')
    @include('vendor.partials.post-controlling-headline')
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
                            <form method="post" class="form-horizontal" role="form" action="{{route('editBooksRequest')}}">
                                @csrf
                                <input type="text" name="id" value="{{$book->id}}"  hidden="true">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" class="form-control" placeholder="Enter your title" value="{{$book->title}}">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Content</label>
                                    <textarea id="tinymce" name="content">{{$book->content}}</textarea>
                                </div>
                                <div class="form-group hidden"><label class="col-sm-2 control-label">Category <br/>
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
                                                    @if($author->id == $book->author_id)
                                                        <option value="{{$author->id}}" id="authors_options" selected="true" >{{$author->name}}</option>
                                                    @else
                                                        <option value="{{$author->id}}" id="authors_options">{{$author->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select></div>
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
