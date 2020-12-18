@extends('layouts.master')

@push('title')
- Daftar Siswa
@endpush

@push('styles')


<link rel="stylesheet" href="{{URL::to('vendor/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/assets/vendors/css/vendor.bundle.base.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/assets/css/style.css')}}">
<link rel="shortcut icon" href="{{ URL::to('vendor/assets/images/logo-atas.png')}}">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@endpush

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account-card-details"></i>
        </span> Detail Siswa
    </h3>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title" style="padding: 10px"><a href="{{ url('students') }}" class="btn btn-success btn-sm">Kembali <i class="mdi mdi-arrow-left-bold-circle-outline"></i></a></div>
                <dl class="row">
                    <dt class="col-sm-3">Nama Siswa</dt>
                    <dd class="col-sm-9">
                        <p>{{ $student->name }}</p>
                    </dd>

                    <dt class="col-sm-3">Alamat Email</dt>
                    <dd class="col-sm-9">
                        <p>{{ $student->email }}</p>
                    </dd>

                    <dt class="col-sm-3">Nomor Induk Siswa</dt>
                    <dd class="col-sm-9">
                        <p>{{ $student->nis }}</p>
                    </dd>

                    <dt class="col-sm-3">Kelas</dt>
                    <dd class="col-sm-9">
                        <p>{{ $student->class_name }}</p>
                    </dd>

                    <dt class="col-sm-3">Tahun Masuk</dt>
                    <dd class="col-sm-9">
                        <p>{{ $student->entry_year }}</p>
                    </dd>

                    <dt class="col-sm-3">Nomor Telepon</dt>
                    <dd class="col-sm-9">
                        <p>{{ $student->phone_number }}</p>
                    </dd>

                    <dt class="col-sm-3">Jenis Kelamin</dt>
                    <dd class="col-sm-9">
                        <p>{{ $student->gender }}</p>
                    </dd>

                    <dt class="col-sm-3">Tempat Lahir</dt>
                    <dd class="col-sm-9">
                        <p>{{ $student->place_of_birth }}</p>
                    </dd>

                    <dt class="col-sm-3">Tanggal, Bulan, Tahun Lahir</dt>
                    <dd class="col-sm-9">
                        @if($student->date_of_birth == null)
                        <p></p>
                        @else
                        <p>{{ $student->date_of_birth->format("d F, Y") }}</p>
                        @endif
                    </dd>

                    <dt class="col-sm-3">Agama</dt>
                    <dd class="col-sm-9">
                        <p>{{ $student->religion }}</p>
                    </dd>

                    <dt class="col-sm-3">Alamat</dt>
                    <dd class="col-sm-9">
                        <p>{{ $student->address }}</p>
                    </dd>


                    <dt class="col-sm-3">Status</dt>
                    <dd class="col-sm-9">
                        @if($student->is_active = true)
                        <p>Aktif <span class="mdi mdi-check-circle"></span></p>
                        @else
                        <p>Tidak Aktif <span class="mdi mdi-close-circle"></span></p>
                        @endif

                    </dd>
                </dl>

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