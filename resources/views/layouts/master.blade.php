<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>E-Learning @stack('title')</title>

  @stack('styles')
</head>

<body>
  <div class="container-scroller">

    @include ('includes.navbar')
    <div class="container-fluid page-body-wrapper">

      @include ('includes.sidebar')

      <div class="main-panel">
        <div class="content-wrapper">
          @yield ('content')
        </div>
      </div>
    </div>

    <footer class="footer">
      <div class="container-fluid clearfix">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates </a> from Bootstrapdash.com</span>
      </div>
    </footer>


    @stack('scripts')
</body>

</html>