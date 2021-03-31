@extends('back-learning.layouts.master')

@push('title')
- Beranda
@endpush

@push('styles')
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/css/style.css')}}">
@endpush

@section('content')

@if($role->rol_id == 4)
@if(is_null($student_class))
<div class="row" id="proBanner">
  <div class="col-12">
    <span class="d-flex align-items-center purchase-popup">
      <p>Anda belum memiliki kelas, silahkan klik tombol di kanan untuk memilih kelas!</p>
      <a href="{{ url('select-classes') }}" class="btn download-button purchase-button ml-auto">Kelas</a>
      <i class="mdi mdi-close" id="bannerClose"></i>
    </span>
  </div>
</div>
@endif
@endif
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
        <img src="{{ URL::to('vendor/be/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image">
        <h4 class="font-weight-normal mb-3">Jumlah Kelas <i class="mdi mdi-home-modern mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-5">{{ $classes }}</h2>
        <h6 class="card-text">SMKS MAHAPUTRA</h6>
      </div>
    </div>
  </div>
  <div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-info card-img-holder text-white">
      <div class="card-body">
        <img src="{{ URL::to('vendor/be/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image">
        <h4 class="font-weight-normal mb-3">Jumlah Siswa <i class="mdi mdi-account-card-details mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-5">{{ $students }}</h2>
        <h6 class="card-text">SMKS MAHAPUTRA</h6>
      </div>
    </div>
  </div>
  <div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-success card-img-holder text-white">
      <div class="card-body">
        <img src="{{ URL::to('vendor/be/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image">
        <h4 class="font-weight-normal mb-3">Jumlah Guru <i class="mdi mdi-account-card-details mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-5">{{ $teachers }}</h2>
        <h6 class="card-text">SMKS MAHAPUTRA</h6>
      </div>
    </div>
  </div>
</div>
<!-- 
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <div div class="table-responsive">
          <table class="table table-hover">
                <h4>Riwayat login pengguna</h4>
                  @foreach($user_log_histories as $user_log)
                  <tr>
                      <td>{{ $user_log->user->usr_name}}</td>
                      <td>{{ getDateFormatLDFYHIS($user_log->ulh_date) }}</td>
                  </tr>
                  @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div> -->
@push('scripts')
<script src="{{URL::to('vendor/be/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/off-canvas.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/misc.js')}}"></script>
<script src="{{ URL::to('vendor/be/assets/js/dashboard.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/todolist.js')}}"></script>
@endpush
@endsection