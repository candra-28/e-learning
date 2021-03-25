<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-Learning - Error 429</title>
    <link rel="stylesheet" href="{{ asset('vendor/be/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/be/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/be/assets/css/style.css')}}">
    <link rel="shortcut icon" href="{{ asset('vendor/be/assets/images/favicon.ico')}}">
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
                <div class="row flex-grow">
                    <div class="col-lg-7 mx-auto text-white">
                        <div class="row align-items-center d-flex flex-row">
                            <div class="col-lg-6 text-lg-right pr-lg-4">
                                <h1 class="display-1 mb-0">429</h1>
                            </div>
                            <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                                <h2>Maaf!</h2>
                                <h3 class="font-weight-light">Anda di alihkan karena terlalu banyak permintaan</h3>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 text-center mt-xl-2">
                                <a class="text-white font-weight-medium" href="{{ url('/') }}">Kembali ke beranda</a>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 mt-xl-2">
                                <p class="text-white font-weight-medium text-center">Copyright © {{ year() }} E-Learning All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendor/be/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{ asset('vendor/be/assets/js/off-canvas.js')}}"></script>
    <script src="{{ asset('vendor/be/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{ asset('vendor/be/assets/js/misc.js')}}"></script>
</body>

</html>