<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'BookVerse')</title>

        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{asset('css/plugins/iCheck/custom.css')}}" rel="stylesheet">
        <link href="{{asset('css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">

        <link href="{{asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
        @vite(['resources/js/tinymce.js'])
    </head>
    <body>
        <div id="wrapper">
            @include('vendor.partials.header')
            <div id="page-wrapper" class="gray-bg">
                @include('vendor.partials.form-errors')
                @include('vendor.partials.topnav')
                @yield('headline')

                @yield('content')
                @include('vendor.partials.footer')
            </div>
        </div>
    </body>
</html>

<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('js/inspinia.js')}}"></script>
<script src="{{asset('js/plugins/pace/pace.min.js')}}"></script>
