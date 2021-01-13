@extends('layouts.master')

@push('title')
- Profile
@endpush

@push('styles')
<link rel="stylesheet" href="{{URL::to('vendor/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/assets/vendors/css/vendor.bundle.base.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/assets/css/style.css')}}">
<link rel="shortcut icon" href="{{ URL::to('vendor/assets/images/logo-atas.png')}}">
@endpush

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account"></i>
        </span> Profile
    </h3>
</div>

<div class="row">
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">

                <center class="m-t-30"> <img src="#" id="tampil_picture" style="object-fit: cover; height: 200px; width: 200px; border-radius:100px;" />
                    <input type="file" name="usr_profile_picture" id="preview_gambar" class="img-thumbnail" style="display:none" onchange="document.getElementById('usr_profile_picture').value=this.value" /><br>

                    <button type="button" id="usr_profile_picture" class="btn btn-outline-primary btn-sm waves-effect waves-light m-2" onclick="document.getElementById('preview_gambar').click()">Pilih Gambar</button>
                    
<!-- 
                    <h4 class="card-title m-t-10">{{ Auth::user()->name }}</h4>
                    <h6 class="card-subtitle">{{ Auth::user()->role_id }}</h6>
                    <div class="row text-center justify-content-md-center">
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i>
                                <font class="font-medium">254</font>
                            </a></div>
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i>
                                <font class="font-medium">54</font>
                            </a></div>
                    </div> -->
                </center>
            </div>

            <div class="card-body">
                <hr>
                    <h4 class="font-medium m-t-30 text-center" style="font-family: sans-serif;">Akun</h4>
                <hr>
             <dt>Email address </dt>
                <h6><a href="https://www.wrappixel.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ddb5bcb3b3bcbab2abb8af9dbab0bcb4b1f3beb2b0">[email&nbsp;protected]</a></h6> <small class="text-muted p-t-30 db">Phone</small>
                <h6>+91 654 784 547</h6> <small class="text-muted p-t-30 db">Address</small>
                <h6>71 Pilgrim Avenue Chevy Chase, MD 20815</h6>
            </div>
        </div>
    </div>



    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link show" data-toggle="tab" href="#profile" role="tab" aria-selected="true">Profile</a> </li>
                <li class="nav-item"> <a class="nav-link show" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Ubah Kata sandi</a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!--second tab-->
                <div class="tab-pane active show" id="profile" role="tabpanel">
                    <div class="card-body">
                        <div class="row">
                            <dt class="col-sm-3">Tanggal Beli</dt>
                            <dd class="col-sm-9">
                                <p>asdasdas</p>
                            </dd>

                            <dt class="col-sm-3">Name Pembeli</dt>
                            <dd class="col-sm-9">
                                <p>asdasdasd</p>
                            </dd>

                            <dt class="col-sm-3">Email Pembeli</dt>
                            <dd class="col-sm-9">
                                <p>asdasdsd</p>
                            </dd>

                            <dt class="col-sm-3">Nama Makanan</dt>
                            <dd class="col-sm-9">
                                <p>asdasd</p>
                            </dd>

                            <dt class="col-sm-3">Harga Makanan</dt>
                            <dd class="col-sm-9">
                                <p>asdasdasd</p>
                            </dd>

                            <dt class="col-sm-3">Jumlah Beli</dt>
                            <dd class="col-sm-9">
                                <p>sadasd</p>
                            </dd>
                        </div>
                        <hr>
                        <h4 class="font-medium m-t-30">Deskripsi Tentang Saya</h4>
                        <hr>
                        <p class="m-t-30">PPPPPPPPPPPPPPPPPPPPPPP.</p>
                        <p>AAAAAAAAAAAAAAAAAAAAA </p>
                        <p>CCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC.</p>

                    </div>
                </div>
                <div class="tab-pane show" id="settings" role="tabpanel">
                    <div class="card-body">
                        <form class="form-horizontal form-material" method="POST" action="{{ url('profile/update-password') }}">
                         @csrf
                            @if ($message = Session::get('success'))
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button> 
                                      <small>asd</small>
                                  </div>
                                </div>
                            </div>
                            @endif
                            <div class="form-group">
                                <label class="col-md-12">Kata sandi lama</label>
                                <div class="col-md-12">
                                    <input type="password" name="current-password" placeholder="sandi lama" class="form-control form-control-line">
                                    @error('current-password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    @if (Session::has('error'))
                                    <div class="text-danger">
                                        {{ Session::get('error') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Kata sandi baru</label>
                                <div class="col-md-12">
                                    <input type="password" placeholder="sandi baru" class="form-control form-control-line" name="new-password">
                                    @error('new-password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Ulangi kata sandi</label>
                                <div class="col-md-12">
                                    <input type="password" name="new-password_confirmation" placeholder="ulangi sandi" class="form-control form-control-line">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-primary">simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@push('scripts')
<script src="{{URL::to('vendor/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{URL::to('vendor/assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{URL::to('vendor/assets/js/off-canvas.js')}}"></script>
<script src="{{URL::to('vendor/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{URL::to('vendor/assets/js/misc.js')}}"></script>
<script src="{{URL::to('vendor/assets/js/todolist.js')}}"></script>
<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#tampil_picture').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#preview_gambar").change(function() {
        bacaGambar(this);
    });
</script>
@endpush
@endsection