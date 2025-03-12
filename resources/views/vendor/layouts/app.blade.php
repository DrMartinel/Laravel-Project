<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'BookVerse')</title>

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
            @include('vendor.partials.header')
            <div id="page-wrapper" class="gray-bg">
                @include('vendor.partials.topnav')
                @include('vendor.partials.form-errors')
                @yield('content')
                @include('vendor.partials.footer')
            </div>
        </div>
    </body>
</html>
