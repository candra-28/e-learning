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
      <i class="mdi mdi-home"></i>
    </span> Dashboard
  </h3>
  <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">
        <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
      </li>
    </ul>
  </nav>
</div>
<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth">
      <div class="row flex-grow">
        <div class="col-lg-12 mx-auto">
          <div class="auth-form-light text-left p-5">
            <div class="page-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="cover-profile">
                    <div class="profile-bg-img">
                      <img class="profile-bg-img img-fluid" src="{{URL::to('vendor/assets/images/user-profile/bg-img1.jpg')}}" alt="bg-img">
                      <div class="card-block user-info">
                        <div class="col-md-12">
                          <div class="media-left">
                            <a href="#" class="profile-image">
                              <img class="user-img img-circle" src="{{URL::to('vendor/assets/images/user-profile/user-img.jpg')}}" alt="user-img">
                            </a>
                          </div>
                          <div class="media-body row">
                            <div class="col-lg-12">
                              <div class="user-title">
                                <h2>Josephin Villa</h2>
                                <span class="text-white">Web designer</span>
                              </div>
                            </div>
                            <div>
                              <div class="pull-right cover-btn">
                                <button type="button" class="btn btn-primary m-r-10"><i class="icofont icofont-plus"></i> Follow</button>
                                <button type="button" class="btn btn-primary"><i class="icofont icofont-ui-messaging"></i> Message</button>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                              <li class="nav-item"> <a class="nav-link show active" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Tentang Saya</a> </li>
                              <li class="nav-item"> <a class="nav-link show" data-toggle="tab" href="#settings" role="tab" aria-selected="true">Deskripsi Tentang Saya</a> </li>
                            </ul>
                            <div class="tab-content">
                              <div class="tab-pane show active" id="profile" role="tabpanel">
                                <form class="forms-sample pt-3">
                              </div>
                            </div>
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