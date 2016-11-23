<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>    

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/css/sb-admin-2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fa/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/css/plugins/morris.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/css/plugins/timeline.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/css/plugins/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/selectize.bootstrap3.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/sweetalert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/css/dashboard.css') }}">
	
	{!! Charts::assets() !!}
</head>

<body>

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @include('admin.partials.header')
            @include('admin.partials.sidebar')
        </nav>            

        @if (Session::has('flash_notification.message'))
            <div class="container">
                <div class="alert alert-{{ Session::get('flash_notification.level') }}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('flash_notification.message') }}
                </div>
            </div>
        @endif
        <div id="page-wrapper">
            @yield('content')
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('js/jquery-3.1.0.min.js') }}"></script> --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/admin/js//bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/validator/bootstrap/dist/validator.min.js') }}"></script>
    <script src="{{ asset('js/admin/js/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('js/admin/js/morris/morris.min.js') }}"></script>
    <script src="{{ asset('js/admin/js/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('js/admin/js/sb-admin-2.js') }}"></script>
    <script src="{{ asset('js/admin/js/sb-admin-2.js') }}"></script>
    <script src="{{ asset('js/admin/sweetalert.min.js') }}"></script>


    @include('partials.flash')
</body>
</html>