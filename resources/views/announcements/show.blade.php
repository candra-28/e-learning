@extends('layouts.master')

@push('title')
- Announcement
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
        </span> Detail Pengumuman
    </h3>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 style="font-family:Cambria; font-size: 15px;">{{ $announcement->title }}</h3>
                <h3 style="font-family:Cambria; font-size: 15px;">Dibuat Pada: {{ $announcement->created_at->format("d F, Y") }}</h3>
                <img src="{{ asset('announcement/'.$announcement->name . '/' . $announcement->upload_type) }}" alt="NULL" style="margin-top:10px; margin-bottom: 10px; width: 100%; border-radius:10px;">
                <h3 style="font-family:Cambria; font-size: 13px;">{{ $announcement->description }}</h3>

                <h3 style="font-family:Cambria; font-size: 13px; float: right;">Di Buat Oleh: {{ $announcement->name }}</h3>
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

@endpush
@endsection