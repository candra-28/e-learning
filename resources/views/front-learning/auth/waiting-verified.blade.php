@extends('front-learning.layouts.auth-master')

@section('content')
@if(is_null(Auth()->user()->usr_otp_verified_at))
<div class="auth section-padding">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-xl-4 col-md-6">
                <div class="auth-form card">
                    <div class="card-body">
                        <h3 class="text-center mt-3 mb-3">OTP Verifikasi Akun</h3>
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
                        
                        <form action="{{ url('waiting-verified') }}" class="otp-verified" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Kode OTP</label>
                                <input autocomplete="off" type="text" name="usr_code_otp" class="form-control text-center" placeholder="Masukan kode OTP anda">
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
@endsection

@push('bg')
<div class="bg_icons"></div>
@endpush

@push('js')
<script src="{{ URL::to('vendor/be/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{URL::to('vendor/fe/assets/vendor/validator/jquery.validate.js')}}"></script>
<script src="{{URL::to('vendor/fe/assets/vendor/validator/validator-init.js')}}"></script>
@endpush