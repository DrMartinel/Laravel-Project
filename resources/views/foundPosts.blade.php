@extends('vendor.layouts.specialLayout')
@section('headline')
    @php
        $headline = $data;
        $searchPage = true;
    @endphp
    @include('livewire.headline-component',compact('headline','searchPage'))
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInRight" id="booksContainer">
                @php
                    $userItems = $foundResult
                @endphp
                @include('vendor.partials.show-posts', compact('userItems'))
            </div>
        </div>
    </div>
@endsection
