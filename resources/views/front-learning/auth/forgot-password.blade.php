@extends('front-learning.layouts.auth-master')

@push('title')
- Lupa kata sandi
@endpush

@section('content')
<div class="auth section-padding">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-xl-4 col-md-6">
                <div class="auth-form card">
                    <div class="card-header justify-content-center">
                          <h4 class="card-title text-center"><img src="{{URL::to('vendor/be/assets/images/3.svg')}}" style="width: 50%;"></h4>
                    </div>
                    <div class="card-body">
                        <h4>Lupa kata sandi</h4>
                        <p class="font-weight-light">Masuk alamat email anda disini.</p>
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
                        <form action="{{ url('forgot-password') }}" class="forgot-password" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Alamat email</label>
                                <input autocomplete="off" type="email" name="usr_email" class="form-control" placeholder="Masukan kata sandi anda">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-block waves-effect">Reset</button>
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

<script src="{{URL::to('vendor/fe/assets/vendor/validator/jquery.validate.js')}}"></script>
<script src="{{URL::to('vendor/fe/assets/vendor/validator/validator-init.js')}}"></script>
@endpush