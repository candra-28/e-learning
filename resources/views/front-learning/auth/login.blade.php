<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-Learning - Login</title>
    <link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{URL::to('vendor/be/assets/css/style.css')}}">
    <link rel="shortcut icon" href="{{URL::to('vendor/be/assets/images/logo-atas.png')}}" />
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
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo text-center">
                                <a href="{{ url('/') }}"> <img src="{{URL::to('vendor/be/assets/images/3.svg')}}"></a>
                            </div>
                            <h4>Halo! ayo kita mulai</h4>
                            <h6 class="font-weight-light">Masuk untuk melanjutkan.</h6>
                            <form class="login" action="{{ route('login') }}" method="post">
                                @csrf
                                @if(session('errors'))
                                <div class="alert alert-danger alert-dismissible fade show " role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
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
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{old('email')}}">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">MASUK</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input"> Biarkan saya tetap masuk </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Lupa kata sandi?</a>
                                </div>
                            </form>
                            <div class="text-center mt-4 font-weight-light"> Belum punya akun? <a href="{{ route('register')}}" class="text-primary">Daftar</a> atau
                            <div class="text-center mt-3 font-weight-light"> Kembali ke halama <a href="{{ url('/') }}" class="text-primary">Awal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ URL::to('vendor/be/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{ URL::to('vendor/be/assets/js/off-canvas.js')}}"></script>
    <script src="{{ URL::to('vendor/be/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{ URL::to('vendor/be/assets/js/misc.js')}}"></script>
     <script src="{{ URL::to('vendor/be/assets/js/preloader.js')}}"></script>
    <script src="{{URL::to('vendor/fe/assets/vendor/validator/jquery.validate.js')}}"></script>
    <script src="{{URL::to('vendor/fe/assets/vendor/validator/validator-init.js')}}"></script>
</body>

</html>