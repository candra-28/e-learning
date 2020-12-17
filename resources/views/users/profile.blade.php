@extends('layouts.master')

@push('title')
- My Profile
@endpush

@push('styles')
   <link rel="stylesheet" href="{{URL::to('vendor/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('vendor/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{URL::to('vendor/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ URL::to('vendor/assets/images/logo-atas.png')}}">
@endpush

@section('content')
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-account"></i>
    </span> Profile
  </h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/home') }}">E - Learning</a></li>
      <li class="breadcrumb-item active" aria-current="page">Profile</li>
    </ol>
  </nav>
</div>

<div class="row">
      <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="{{URL::to('vendor/assets/images/faces/avatar-2.png')}}" style="border-radius: 100px;" width="150">
                                    <h4 class="card-title m-t-10">{{ Auth::user()->name }}</h4>
                                    <h6 class="card-subtitle">{{ Auth::user()->role_id }}</h6>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                    </div>
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
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
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Name</strong>
                                                <br>
                                                <p class="text-muted">{{ Auth::user()->name }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted">{{ Auth::user()->email }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Is Active</strong>
                                                <br>
                                                <p class="text-muted">Aktif</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Jenis Kelamin</strong>
                                                <br>
                                                <p class="text-muted">2018</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Agama</strong>
                                                <br>
                                                <p class="text-muted">2018</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Tempat Lahir</strong>
                                                <br>
                                                <p class="text-muted">2018</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Data Lahir</strong>
                                                <br>
                                                <p class="text-muted">2018</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Tahun Masuk</strong>
                                                <br>
                                                <p class="text-muted">2018</p>
                                            </div>
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
                                        <form class="form-horizontal form-material">
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Johnathan Doe" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="example-email" id="example-email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" value="password" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="123 456 7890" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Message</label>
                                                <div class="col-md-12">
                                                    <textarea rows="5" class="form-control form-control-line"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12">Select Country</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control form-control-line">
                                                        <option>London</option>
                                                        <option>India</option>
                                                        <option>Usa</option>
                                                        <option>Canada</option>
                                                        <option>Thailand</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Profile</button>
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
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{URL::to('vendor/assets/vendors/chart.js/Chart.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{URL::to('vendor/assets/js/off-canvas.js')}}"></script>
    <script src="{{URL::to('vendor/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{URL::to('vendor/assets/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{URL::to('vendor/assets/js/dashboard.js')}}"></script>
    <script src="{{URL::to('vendor/assets/js/todolist.js')}}"></script>
@endpush   
@endsection
