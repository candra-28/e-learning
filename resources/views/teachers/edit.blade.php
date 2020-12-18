@extends('layouts.master')

@push('title')
- Edit Guru
@endpush

@push('styles')


<link rel="stylesheet" href="{{URL::to('vendor/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/assets/vendors/css/vendor.bundle.base.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/assets/css/style.css')}}">
<link rel="shortcut icon" href="{{ URL::to('vendor/assets/images/logo-atas.png')}}">

<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account-card-details"></i>
        </span> Guru
    </h3>
</div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Guru</h4>
                <p class="card-description"> Silahkan Ubah jika memang perlu diubah </p>
                <form class="forms-sample" action="{{ url('teacher/edit/'.$teacher->id) }}" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Nama Guru</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" value="{{ $teacher->name }}" class="form-control" id="name" placeholder="Username">
                            @error('name')
                            <div class="col-sm-12 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Tahun Masuk</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" value="{{ $teacher->entry_year }}" class="form-control" id="name" placeholder="Username">
                            @error('name')
                            <div class="col-sm-12 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select name="is_active" class="form-control">

                                @if($teacher->is_active != 0)
                                <option selected disabled value="{{ $teacher->is_active }}">Aktif</option>
                                @else
                                <option selected disabled value="{{ $teacher->is_active }}">Tidak Aktif</option>
                                @endif
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                            @error('is_active')
                            <span class="col-sm-9 text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-gradient-primary mr-2">Simpan</button>
                        </div>
                    </div>

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
@endpush
@endsection