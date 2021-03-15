<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tradient </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png')}}">

    <link rel="stylesheet" href="{{ url('vendor/fe/assets/waves/waves.min.css')}}">
    <link rel="stylesheet" href="{{ url('vendor/fe/assets/owlcarousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ url('vendor/fe/assets/css/style.css')}}">
</head>

<body>

    <div id="preloader" style="display: none;">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper" class="show">

        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <nav class="navbar navbar-expand-lg navbar-light px-0 justify-content-between">
                            <a class="navbar-brand" href="index.html"><img src="{{URL::to('vendor/be/assets/images/1.svg')}}" alt="">
                                <span>E - LEARNING</span></a>
                            <div class="dashboard_log">
                                <div class="d-flex align-items-center">
                                    <div class="header_auth">
                                        <a href="signin.html" class="btn btn-success  mx-2 waves-effect">Sign In</a>
                                        <a href="signup.html" class="btn btn-outline-primary  mx-2 waves-effect">Sign Up</a>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        @if(is_null(Auth()->user()->usr_otp_verified_at))
        <div class="authincation section-padding">
            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-xl-4 col-md-6">
                        <div class="auth-form card">
                            <div class="card-body">
                               
                                <a class="page-back text-muted" href="{{ url('/') }}"><span><i class="fa fa-angle-left"></i></span> Kembali</a>

                                <a class="page-back text-muted" style="float: right;" href="{{ url('logout') }}"><span></span>Keluar <i class="fa fa-angle-right"></i></a>
                                <h3 class="text-center">OTP Verifikasi Akun</h3>
                                <p class="text-justify mb-4">Kami sudah mengirim kode OTP ke alamat email anda, Silahkan masukan kode tersebut untuk melanjutkan masuk ke web E-Learning. Periksa Email anda termasuk ke dalam spam email</p>

                                @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                                @endif
                                @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                                @endif
                                
                                <form action="{{ url('waiting-verified') }}" class="abc" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Masukan Kode OTP Anda</label>
                                        <input autocomplete="off" type="text" name="usr_code_otp" class="form-control text-center">
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-success btn-block waves-effect">Kirim</button>
                                    </div>
                                </form>
                                <form action="{{ url('resend-code-otp') }}" method="post">
                                @csrf
                                <div class="new-account mt-3 d-flex justify-content-between">
                                    <p>Tidak Mendapatkan Code?
                                        <input type="submit" style="background-color: Transparent;  border: none;" value="kirim ulang" class="text-primary"></input>    
                                    </p>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="verification section-padding">
            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-xl-4 col-md-6">
                        <div class="auth-form card">
                            <div class="card-header">
                                <h4 class="card-title">Akun anda berhasil di verifikasi</h4>
                            </div>
                            <div class="card-body">
                                    <div class="identity-content">
                                        <span class="icon"><i class="fa fa-check"></i></span>
                                        <h4>Selamat. Anda telah berhasil memverifikasi akun anda</h4>
                                        <p>Silahkan klik tombol selanjutnya, anda akan di arahkan ke halaman lain dan nikmati web E Learning kami</p>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{ url('dashboard') }}" class="btn btn-success pl-5 pr-5 waves-effect">Continue</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="footer-link text-left">
                            <a href="#" class="m_logo"><img src="{{URL::to('vendor/be/assets/images/1.svg')}}" alt=""></a>
                            <a href="about.html">About</a>
                            <a href="privacy-policy.html">Privacy Policy</a>
                            <a href="term-condition.html">Term &amp; Service</a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 text-lg-right text-center">
                        <div class="social">
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-xl-12 text-center text-lg-right">
                        <div class="copy_right text-center text-lg-center">
                            Copyright © 2019 Quixlab. All Rights Reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg_icons"></div>

    <script src="{{ asset('vendor/fe/assets/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('vendor/fe/assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('vendor/fe/assets/waves/waves.min.js')}}"></script>

    <script src="{{ asset('vendor/fe/assets/owlcarousel/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('vendor/fe/assets/js/plugins/owl-carousel-init.js')}}"></script>
    <script src="{{ asset('vendor/fe/assets/scrollit/scrollIt.js')}}"></script>
    <script src="{{ asset('vendor/fe/assets/js/plugins/scrollit-init.js')}}"></script>

    <!-- Chart sparkline plugin files -->
    <script src="{{ asset('vendor/fe/assets/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('vendor/fe/assets/js/plugins/sparkline-init.js')}}"></script>

    <script src="{{ asset('vendor/fe/assets/validator/jquery.validate.js')}}"></script>
    <script src="{{ asset('vendor/fe/assets/validator/validator-init.js')}}"></script>
    <script src="{{ asset('vendor/fe/assets/js/scripts.js')}}"></script>
<!--     <script src="{{URL::to('vendor/fe/assets/js/scripts.js')}}"></script> -->
</body>
</html>