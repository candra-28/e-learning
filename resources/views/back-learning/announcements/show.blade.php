@extends('back-learning.layouts.master')

@push('title')
- Announcement Detail
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
        </span> Detail Pengumuman
    </h3>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 style="font-family:Cambria;">{{ $announcement->acm_title }}</h3>
                <h3 style="font-family:Cambria; font-size: 15px;">Dibuat Pada: {{ getDateFormatLDFYHIS($announcement->acm_created_at) }}</h3>
                <img src="{{ asset($announcement->acm_upload_file) }}" alt="NULL" style="margin-top:10px; margin-bottom: 10px; width: 100%; border-radius:10px;">
                <h3 style="font-family:Cambria;">{!! $announcement->acm_description !!}</h3>

                <h3 style="font-family:Cambria; font-size: 13px; float: right;">Di Buat Oleh: {{ $announcement->user->usr_name}}</h3>
            </div>
        </div>
    </div>
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