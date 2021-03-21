@extends('back-learning.layouts.master')

@push('title')
- Pengumuman
@endpush

@push('styles')
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/css/vendor.bundle.base.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/css/style.css')}}">
<link rel="shortcut icon" href="{{ URL::to('vendor/be/assets/images/logo-atas.png')}}">
@endpush

@section('content')
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-voice"></i>
    </span> Pengumuman
  </h3>
</div>


<div class="form-group">
  <form class="form-inline" method="get" action="{{ url('announcement/search') }}">
    <div class="input-group">
      <input name="slug" type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn btn-sm btn-gradient-primary" type="submit">Search</button>
      </div>
    </div>
  </form>
</div>

<div class="row">
  @foreach($announcements as $announcement)
  <div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-danger card-img-holder">
      <div class="card-body">
        <h2 class="font-weight-normal mb-3 text-center">{{ $announcement->acm_title }}</i>
          </h4>
          <h2 class="text-center mb-5"><img src="{{ asset('vendor/be/assets/images/announcements/test.jpg') }}" style="border-radius: 10px; max-width: 100%; width: 200px; height: 200px;" alt="null"></h2>
          <div class="btn-group-vertical" role="group" aria-label="Basic example">
            <div class="btn-group text-center">
              <button type="button" style="left: 30%;" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Opsi </button>
              <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 44px, 0px);">
                <a class="dropdown-item">Selengkapnya</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item">Edit Pengumuman</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item">Ubah Status</a>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  @endforeach
</div>

@push('scripts')
<script src="{{URL::to('vendor/be/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/off-canvas.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/misc.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/todolist.js')}}"></script>
@endpush
@endsection