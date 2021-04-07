@extends('front-learning.layouts.auth-master')

@push('title')
- Setel ulang kata sandi
@endpush

@section('content')
<div class="auth section-padding">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-xl-4 col-md-6">
                <div class="auth-form card">
                    <div class="card-header justify-content-center">
                        <h4 class="card-title">Setel Ulang Kata Sandi</h4>
                    </div>
                    <div class="card-body">
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
                        <form action="{{ url('reset-password') }}" class="reset-password" method="post">
                            @csrf
                            <input type="hidden" name="pwr_email" value="{{ $resetPassword->pwr_email }}">
                            <div class="form-group">
                                <label>Kata sandi</label>
                                <div class="input-group mb-3">
                                  <input placeholder="Masukan kata sandi baru" type="password" class="form-control input-password" name="usr_password" id="usr_password">
                                  <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                        <i class="fa show-password fa-eye"></i>
                                    </span>
                                  </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ulangi Kata sandi</label>
                                <input autocomplete="off" type="password" name="usr_retype_password" class="form-control" placeholder="Ulangi kata sandi">
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
<script>
    $(".show-password").click(function() {
      $(this).toggleClass("fa-eye-slash fa-eye");
      var input = $('.input-password');
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
</script>
@endpush