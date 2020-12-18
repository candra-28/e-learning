@extends('layouts.master')

@push('title')
- Dashboard
@endpush

@push('styles')
<link rel="stylesheet" href="{{URL::to('vendor/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/assets/vendors/css/vendor.bundle.base.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/assets/css/style.css')}}">
<link rel="shortcut icon" href="{{ URL::to('vendor/assets/images/logo-atas.png')}}">
@endpush

@section('content')
<div class="row d-none" id="proBanner">
  <div class="col-12">
    <span class="d-flex align-items-center purchase-popup">
      <p>Get tons of UI components, Plugins, multiple layouts, 20+ sample pages, and more!</p>
      <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template?utm_source=organic&amp;utm_medium=banner&amp;utm_campaign=free-preview" target="_blank" class="btn download-button purchase-button ml-auto">Upgrade To Pro</a>
      <i class="mdi mdi-close" id="bannerClose"></i>
    </span>
  </div>
</div>
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-home"></i>
    </span> Dashboard
  </h3>
</div>
<div class="row">
  <div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-danger card-img-holder text-white">
      <div class="card-body">
        <img src="{{ URL::to('vendor/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image">
        <h4 class="font-weight-normal mb-3">Jumlah Kelas <i class="mdi mdi-home-modern mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-5">{{$class}}</h2>
        <h6 class="card-text">SMKS MAHAPUTRA</h6>
      </div>
    </div>
  </div>
  <div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-info card-img-holder text-white">
      <div class="card-body">
        <img src="{{ URL::to('vendor/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image">
        <h4 class="font-weight-normal mb-3">Jumlah Siswa <i class="mdi mdi-account-card-details mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-5">{{$student}}</h2>
        <h6 class="card-text">SMKS MAHAPUTRA</h6>
      </div>
    </div>
  </div>
  <div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-success card-img-holder text-white">
      <div class="card-body">
        <img src="{{ URL::to('vendor/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image">
        <h4 class="font-weight-normal mb-3">Jumlah Guru <i class="mdi mdi-account-card-details mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-5">{{$teacher}}</h2>
        <h6 class="card-text">SMKS MAHAPUTRA</h6>
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