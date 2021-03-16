<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} @stack('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('vendor\fe\assets\images/favicon.png')}}">
    <link rel="stylesheet" href="{{ url('vendor/fe/assets/css/style.css')}}">
    <style type="text/css">
        .header.fixed {
        position: absolute;
        background: transparent;
        transition: all 0.3s ease-in; }
    </style>
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

<div id="main-wrapper" class="show">

@include('front-learning.includes.auth.navbar')
    @yield('content')

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
                        Copyright © 2021 E-Learning. All Rights Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stack('bg')

@stack('js')
<script src="{{ URL::to('vendor/be/assets/js/preloader.js')}}"></script>