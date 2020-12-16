@extends('layouts.master')

@push('title')
- Create Announcement
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
      <i class="mdi mdi-voice"></i>
    </span> Buat Pengumuman
  </h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">E - Learning</a></li>
      <li class="breadcrumb-item"><a href="{{ url('/announcements') }}">Pengumuman</a></a></li>
      <li class="breadcrumb-item active" aria-current="page">Buat Pengumuman</li>
    </ol>
  </nav>
</div>
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Buat Pengumuman</h4>
        <p class="card-description"> Masukan Pengumuman Yang Akan Anda Buat </p>
        <form class="forms-sample" action="{{ url('announcement/create') }}" method="post" autocomplete="off" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="exampleInputName1">Judul</label>
            <input type="text" name="title" class="form-control" id="exampleInputName1" value="{{ old('title') }}" placeholder="Masukan Judul Pengumuman">
            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label>File upload</label>
            <input type="file" name="upload_type" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" value="{{ old('upload_type') }}" disabled="" placeholder="Upload File">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
              </span>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Deskripsi</label>
            <textarea name="description" class="form-control" rows="10" placeholder="Masukan Description Pengumuman" value="{{ old('description') }}" id="exampleTextarea1" rows="4"></textarea>
            @error('description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
          <button type="reset" class="btn btn-light">Cancel</button>
        </form>
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

<script src="{{ URL::to('vendor/assets/js/file-upload.js')}}"></script>
@endpush
@endsection