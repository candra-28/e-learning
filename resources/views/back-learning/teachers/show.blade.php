@extends('back-learning.layouts.master')

@push('title')
- Detail Guru
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
            <i class="mdi mdi-account-card-details"></i>
        </span> Detail Guru
    </h3>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title" style="padding: 10px"><a href="{{ url('teachers') }}" class="btn btn-success btn-sm">Kembali <i class="mdi mdi-arrow-left-bold-circle-outline"></i></a></div>
                <div class="row mt-3">
                    <div class="col-12 mb-4">
                        <dt class="text-center mb-2">Profile Guru</dt>
                        <div class="text-center mb-2">
                            @if(isset($teacher->user->usr_profile_picture))
                            <img src="{{ asset($teacher->user->usr_profile_picture) }}" style="object-fit: cover; height: 200px; width:230px; text-align:center; border-radius: 10px;" alt="tidak ada profile">
                            @else
                            <img src="{{ asset('vendor/be/assets/images/profile_picture/avatar-2.png') }}" style="object-fit: cover; height: auto; width:230px; text-align:center; border-radius: 10px;" alt="tidak ada profile">
                            @endif
                        </div>
                    </div>
                </div>

                <dl class="row">
                    <dt class="col-sm-3">Nama Guru</dt>
                    <dd class="col-sm-9">
                        <p>{{ $teacher->user->usr_name }}</p>
                    </dd>

                    <dt class="col-sm-3">Alamat Email</dt>
                    <dd class="col-sm-9">
                        <p>{{ $teacher->user->usr_email }}</p>
                    </dd>

                    <dt class="col-sm-3">Nomor Identitas Kepegawaian</dt>
                    <dd class="col-sm-9">
                        <p>{{ $teacher->tcr_nip }}</p>
                    </dd>

                    <dt class="col-sm-3">Nomor Telepon</dt>
                    <dd class="col-sm-9">
                        <p>{{ $teacher->user->usr_phone_number }}</p>
                    </dd>

                    <dt class="col-sm-3">Tahun masuk</dt>
                    <dd class="col-sm-9">
                        <p>{{ $teacher->tcr_entry_year }}</p>
                    </dd>

                    <dt class="col-sm-3">Jenis Kelamin</dt>
                    <dd class="col-sm-9">
                        <p>{{ $teacher->user->usr_gender }}</p>
                    </dd>

                    <dt class="col-sm-3">Tempat Lahir</dt>
                    <dd class="col-sm-9">
                        <p>{{ $teacher->user->usr_place_of_birth }}</p>
                    </dd>

                    <dt class="col-sm-3">Tanggal, Bulan, Tahun Lahir</dt>
                    <dd class="col-sm-9">
                        <p>{{ getDateFormat($teacher->user->usr_date_of_birth) }}</p>
                    </dd>

                    <dt class="col-sm-3">Agama</dt>
                    <dd class="col-sm-9">
                        <p>{{ $teacher->user->usr_religion }}</p>
                    </dd>

                    <dt class="col-sm-3">Alamat</dt>
                    <dd class="col-sm-9">
                        <p>{{ $teacher->user->usr_address }}</p>
                    </dd>

                    <dt class="col-sm-3">Status</dt>
                    <dd class="col-sm-9">
                        @if($teacher->tcr_is_active == true)
                        <p><label class="badge badge-success">aktif</label></p>
                        @else
                        <p><label class="badge badge-danger">tidak aktif</label></p>
                        @endif
                    </dd>
                </dl>
                <dt class="mb-2">Riwaya Mengajar</dt>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="text-upercase" style="background-color: #00FFFF;">
                            <tr>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Mata pelajaran</th>
                                <th>Tahun ajaran</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
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