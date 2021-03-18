@extends('back-learning.layouts.master')

@push('title')
- Buat Kelas
@endpush

@push('styles')
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/css/vendor.bundle.base.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/css/style.css')}}">
@endpush

@section('content')

<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-voice"></i>
    </span> Buat Kelas
  </h3>
</div>
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
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
        <h4 class="card-title">Buat Kelas Baru</h4>
        <p class="card-description"> Masukan kelas yang akan anda buat</p>
        <form action="{{ url('class/create') }}" method="post" autocomplete="off" class="add-class">
          @csrf
          <div class="form-group">
            <label>Tingkat kelas</label>
            <select name="cls_grade_level_id" class="form-control">
              <option selected disabled>-- Pilih --</option>
              @foreach($grades as $grade)
              <option value="{{ $grade->grl_id }}">{{ $grade->grl_name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Jurusan</label>
            <select name="cls_major_id" class="form-control">
              <option selected disabled>-- Pilih --</option>
              @foreach($majors as $major)
              <option value="{{ $major->mjr_id }}">{{ $major->mjr_name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Tahun ajaran</label>
            <select name="cls_school_year_id" class="form-control">
              <option selected disabled>-- Pilih --</option>
              @foreach($school_years as $school_year)
              <option value="{{ $school_year->scy_id  }}">{{ $school_year->scy_name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Nomor kelas</label>
            <input type="text" name="cls_number" class="form-control" placeholder="Masukan nomor kelas">
          </div>
          <button type="submit" class="btn btn-gradient-primary mr-2">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ URL::to('vendor/be/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{ URL::to('vendor/be/assets/js/off-canvas.js')}}"></script>
<script src="{{ URL::to('vendor/be/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{ URL::to('vendor/be/assets/js/misc.js')}}"></script>
<script src="{{URL::to('vendor/fe/assets/vendor/validator/jquery.validate.js')}}"></script>
<script src="{{URL::to('vendor/fe/assets/vendor/validator/validator-init.js')}}"></script>
@endpush