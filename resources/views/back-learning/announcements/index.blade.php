@extends('back-learning.layouts.master')

@push('title')
- Pengumuman
@endpush

@push('styles')
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/css/vendor.bundle.base.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/css/style.css')}}">
<link rel="shortcut icon" href="{{ URL::to('vendor/be/assets/images/logo-atas.png')}}">
<script src="{{ URL::to('vendor/be/assets/dataTable/ajax_jquery.js') }}"></script>
@endpush

@section('content')
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-voice"></i>
    </span> Pengumuman
  </h3>
</div>

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
  <form class="form-inline" method="GET" action="{{ url('announcement/search') }}">
    <div class="input-group">
      <input name="acm_slug" type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn btn-sm btn-gradient-primary" type="submit">Search</button>
      </div>
    </div>
  </form>
</div>

<div class="text-right">
  @if(
  <a href="{{ url('announcement/create') }}" type="button" data-toggle="tooltip" data-placement="left" title="Tambah Pengumuman" class="btn btn-primary btn-sm mb-2"><i class="mdi mdi-plus-box"></i></a>
</div>

<div class="row">
  @foreach($announcements as $announcement)
  <div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-danger card-img-holder">
      <div class="card-body">
        <h2 class="font-weight-normal mb-3 text-center">{{ $announcement->acm_title }}</i>
          </h4>
          <h2 class="text-center mb-5"><img src="{{ asset($announcement->acm_upload_file) }}" style="border-radius: 10px; max-width: 100%; width: 200px; height: 200px;" alt="null"></h2>
          <div class="btn-group-vertical" role="group" aria-label="Basic example">
            <div class="btn-group text-center">
              <button type="button" style="left: 30%;" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Opsi </button>
              <div class="dropdown-menu" x-placement="bottom-start" style="cursor:default; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 44px, 0px);">
                <a href="{{ url('announcement/'.$announcement->acm_id) }}" class="dropdown-item">Selengkapnya</a>
                <div class="dropdown-divider"></div>
                <a href="{{ url('announcement/edit/'.$announcement->acm_id) }}" class="dropdown-item">Edit Pengumuman</a>
                <div class="dropdown-divider"></div>
                <a href="javascript:void(0)" data-id="{{ $announcement->acm_id }}" class="dropdown-item status_announcement">Ubah status</a>
              </div>

            </div>
          </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
{{ $announcements->onEachSide(5)->links() }}

@push('scripts')
<script src="{{URL::to('vendor/be/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/off-canvas.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/misc.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/todolist.js')}}"></script>
<script src="{{ URL::to('vendor/be/assets/dataTable/datatable.js') }}"></script>

<script src="{{ URL::to('vendor/be/assets/js/sweetalert.min.js') }}"></script>
<script>

</script>
@endpush
@endsection