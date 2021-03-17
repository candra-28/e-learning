<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>E-Learning @stack('title')</title>
  <link rel="shortcut icon" href="{{ URL::to('vendor/be/assets/images/logo-atas.png')}}">
  @stack('styles')
</head>

<body>
  <div id="preloader">
    <div class="sk-three-bounce">
      <div class="sk-child sk-bounce1"></div>
      <div class="sk-child sk-bounce2"></div>
      <div class="sk-child sk-bounce3"></div>
    </div>
  </div>
  <div class="container-scroller">

    @include('back-learning.includes.navbar')
    <div class="container-fluid page-body-wrapper">

      @include('back-learning.includes.sidebar')

      <div class="main-panel">
        <div class="content-wrapper">
          @yield ('content')
        </div>
      </div>
    </div>

    <footer class="footer">
      <div class="container-fluid clearfix">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © E -Learning 2021</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates </a> from Bootstrapdash.com</span>
      </div>
    </footer>


    @stack('scripts')
    <script src="{{ URL::to('vendor/be/assets/js/preloader.js')}}"></script>
</body>

</html>