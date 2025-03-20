<!DOCTYPE html>
@extends('vendor.layouts.app')
@section('headline')
    @php
        $headline = (isset($userBooks)) ? "All Books" : "All Blogs";
        $searchPage = false;
    @endphp
    @include('vendor.partials.headline',compact('headline','searchPage'))
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
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
    </div>
@endsection
