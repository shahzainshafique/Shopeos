<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
    <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  
  <style>
    a{
      text-decoration: none !important;
    }
  </style>
</head>
    <body>
        
          @include('layouts.inc.frontnavbar')
               <div class="content">@yield('content')</div>
               
           
        
        <script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!--Font Style -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
         <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
         <!--Font Owsome -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
        @if(session('status')){
            <script> swal("{{session('status')}}");</script>
            
        }
        @endif
        @yield('scripts')
</body>
</html>
