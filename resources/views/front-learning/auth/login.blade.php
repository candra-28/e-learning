@extends('front-learning.layouts.auth-master')

@push('title')
- Login
@endpush

@section('content')

<div class="authincation section-padding">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-xl-4 col-md-6">
                <div class="auth-form card">
                    <div class="card-header justify-content-center">
                        <h4 class="card-title text-center"><img src="{{URL::to('vendor/be/assets/images/3.svg')}}" style="width: 50%;"></h4>
                    </div>
                    <div class="card-body">
                    <h4>Halo! ayo kita mulai</h4>
                    <p class="font-weight-light">Masuk untuk melanjutkan.</p>
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
                        <form method="post" class="login" action="{{ url('login') }}" novalidate="novalidate" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label>Alamat Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukan alamat email" name="email">
                            </div>
                            <div class="form-group">
                                <label>Kata sandi</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukan kata sandi" name="password">
                            </div>
                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                <div class="form-group mb-0">
                                    <label class="toggle">
                                        <input class="toggle-checkbox" name="remember" type="checkbox">
                                        <div class="toggle-switch"></div>
                                        <span class="toggle-label">Tetap login</span>
                                    </label>
                                </div>
                                <div class="form-group mb-0">
                                    <span>Lupa sandi?</span><a href="{{ url('forgot-password') }}" class="text-primary"> klik disini</a>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-block waves-effect">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('bg')
<div class="bg_icons"></div>
@endpush

@push('js')
    <script src="{{ URL::to('vendor/be/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{ URL::to('vendor/be/assets/js/off-canvas.js')}}"></script>
    <script src="{{ URL::to('vendor/be/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{ URL::to('vendor/be/assets/js/misc.js')}}"></script>
    <script src="{{URL::to('vendor/fe/assets/vendor/validator/jquery.validate.js')}}"></script>
    <script src="{{URL::to('vendor/fe/assets/vendor/validator/validator-init.js')}}"></script>
@endpush