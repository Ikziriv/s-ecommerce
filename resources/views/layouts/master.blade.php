
<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>@yield('title')</title>

  <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('fa/css/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/category.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/sweetalert.css') }}">
  @yield('style')
  @yield('css')
</head>
<body>
@include('partials.header')

    <!-- Page Content -->
    <div class="container">

        <div class="row">
        @if (Session::has('flash_notification.message'))
            <div class="container">
                <div class="alert alert-{{ Session::get('flash_notification.level') }}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('flash_notification.message') }}
                </div>
            </div>
        @endif	
        @yield('content')
        </div>

    </div>

@include('partials.footer')

@yield('scripts')
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
{{-- <script src="{{ asset('js/jquery-3.1.0.min.js') }}"></script> --}}
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/validator/bootstrap/dist/validator.min.js') }}"></script>
<script src="{{ asset('js/admin/sweetalert.min.js') }}"></script>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="{{ asset('js/checkout.js') }}"></script>
<script>

</script>


  @yield('js')
@include('partials.flash')
</body>

</html>
