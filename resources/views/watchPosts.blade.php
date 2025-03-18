<!DOCTYPE html>
@extends('vendor.layouts.app')
@section('headline')
    @php
        $headline = "Viewing ". $category;
        $searchPage = false;
    @endphp
    @include('vendor.partials.headline',compact('headline','searchPage'))
@endsection
@section('content')
        <div class="ibox-content forum-post-container animated fadeInRight article">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="forum-post-info">
                        <h4><span class="text-navy"><i class="fa fa-globe"></i> Title</span> :  <span class="text-muted">{{$items->title}}</span></h4>
                    </div>
                    <div class="media">
                        <div class="media-body"
                             style="width: 1200px;
                             overflow-wrap: break-word;
                             word-break: break-all;
                             padding: 10px;
                             display: block;">
                                {!!$items->content!!}
                        </div>
                    </div>
                </div>
            </div>
            - Uploaded by {{$items->uploader->name}}
            <br>
            @if(isset($items->author))
                - Written by {{$items->author->name}}
            @endif
            <br>
            <br>
        </div>
@endsection
