<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>A very cool dashboard</title>
    <meta name="description" content="A very, very cool backend">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('library/fontawesome/css/all.min.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('library/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('library/hover.min.css')}}">
    <link rel="stylesheet" href="{{asset('library/animate.min.css')}}">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.2.0" href="{{asset('/styles/style.min.css')}}">
    <script async defer src="{{asset('library/js/button.js')}}"></script>
  </head>
  <body class="h-100">
    <div class="container-fluid">
      <div class="row">
        <!-- End Main Sidebar -->
        @yield('main-content')
      </div>
    </div>
    @yield('main-script')
  </body>
</html>