@extends('layouts.master')

@push('title')
- Edit Siswa
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
            <i class="mdi mdi-account-card-details"></i>
        </span> Edit Siswa
    </h3>
</div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title"><a href="{{ url('teachers') }}" class="btn btn-success btn-sm">Kembali <i class="mdi mdi-arrow-left-bold-circle-outline"></i></a></div>
                <p class="card-description"> Silahkan Ubah jika memang perlu diubah </p>
                <form class="forms-sample" action="{{ url('teacher/edit/'.$teacher->id) }}" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Nomor Identitas Pegawai</label>
                        <div class="col-sm-9">
                            <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" type="text" name="nip" value="{{ $teacher->nip }}" class="form-control">
                            @error('nip')
                            <div class="col-sm-12 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Nama Siswa</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" value="{{ $teacher->name }}" class="form-control" id="name">
                            @error('name')
                            <div class="col-sm-12 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Tahun Masuk</label>
                        <div class="col-sm-9">
                            <select name="entry_year" class="form-control">
                                <option selected>{{ $teacher->entry_year }}</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-9">
                            <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" type="text" name="phone_number" value="{{ $teacher->phone_number }}" class="form-control">
                            @error('phone_number')
                            <div class="col-sm-12 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <select name="gender" class="form-control">
                                @if($teacher->gender != "pria")
                                <option selected value="{{ $teacher->gender }}">Pria</option>
                                @else
                                <option selected value="{{ $teacher->gender }}">Wanita</option>
                                @endif
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-9">
                            <input type="text" name="place_of_birth" value="{{ $teacher->place_of_birth }}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Tanggal, Bulan, Tahun Lahir</label>
                        <div class="col-sm-9">
                            <input name="date_of_birth" value="{{ $teacher->date_of_birth }}" class="form-control" type="date">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <input type="text" name="address" value="{{ $teacher->address }}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select name="is_active" class="form-control">

                                @if($teacher->is_active != 0)
                                <option selected value="{{ $teacher->is_active }}">Aktif</option>
                                @else
                                <option selected value="{{ $teacher->is_active }}">Tidak Aktif</option>
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