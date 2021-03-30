@extends('back-learning.layouts.master')

@push('title')
- Edit Siswa
@endpush

@push('styles')
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/css/vendor.bundle.base.css')}}">
<link href="{{ URL::to('vendor/be/assets/vendors/datepicker/datepicker.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/css/style.css')}}">
@endpush

@section('content')

<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account-card-details menu-icon"></i>
        </span> Siswa
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
                @error('stu_nis')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <h4 class="card-title">Edit Siswa</h4>
                <p class="card-description"> Masukan data siswa yang akan diubah</p>
                <form action="{{ url('student/edit/'.$student->stu_id) }}" method="post" autocomplete="off" class="edit-student" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-12 mb-4">
                            <p class="text-center mb-2">Profile Siswa</p>
                            <div class="text-center mb-2">
                                @if(isset($student->user->usr_profile_picture))
                                <img src="{{ asset($student->user->usr_profile_picture) }}" id="tampil_picture" style="object-fit: cover; height: 200px; width:230px; text-align:center;">
                                @else
                                <img src="{{ asset('vendor/be/assets/images/profile_picture/avatar-2.png') }}" id="tampil_picture" style="object-fit: cover; height: auto; width:230px; text-align:center;">
                                @endif

                            </div>
                            <div class="text-center">
                                <input accept="image/x-png,image/gif,image/jpeg" type="file" name="usr_profile_picture" id="preview_gambar" onchange="document.getElementById('usr_profile_picture').value=this.value" /><br>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama siswa <span class="text-danger">*</span></label>
                        <input type="text" name="usr_name" class="form-control" value="{{ $student->user->usr_name }}" placeholder="Masukan nama siswa">
                    </div>
                    <div class="form-group">
                        <label>Nomor telepon <span class="text-danger">*</span></label>
                        <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" type="text" name="usr_phone_number" class="form-control" value="{{ $student->user->usr_phone_number }}" placeholder="Masukan nomor telepon">
                    </div>

                    <div class="form-group">
                        <label>NIS <span class="text-danger">*</span></label>
                        <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" type="text" name="stu_nis" value="{{ $student->stu_nis }}" class="form-control" placeholder="Masukan nomor induk siswa">
                    </div>

                    <div class="form-group">
                        <label>Jenis kelamin</label>
                        <div class="col-sm-4">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="usr_gender" value="Pria" {{ $student->user->usr_gender=='Pria'?'checked':'' }}> Pria <i class="input-helper"></i></label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="usr_gender" value="Perempuan" {{ $student->user->usr_gender=='Wanita'?'checked':'' }}> Wanita <i class="input-helper"></i></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tempat lahir</label>
                        <input type="text" name="usr_place_of_birth" value="{{ $student->user->usr_place_of_birth }}" class="form-control" placeholder="Masukan tempat lahir">
                    </div>
                    <div class="form-group">
                        <label>Tanggal lahir</label>
                        <input class="form-control date_picker" value="{{ getDateBirthday($student->user->usr_date_of_birth) }}" name="usr_date_of_birth" placeholder="dd\mm\yyy"></input>
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <select name="usr_religion" class="form-control">
                            <option selected value="{{ $student->user->usr_religion }}">{{ $student->user->usr_religion }}</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="usr_address" class="form-control" placeholder="Masukan alamat lengkap" rows="7">{{ $student->user->usr_address }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Tahun Ajaran <span class="text-danger">*</span></label>
                        <select name="stu_school_year_id" class="form-control" id="school_year">
                            <option selected value="{{ $student->stu_school_year_id }}">{{ $student->school_year->scy_name }}</option>
                            @foreach($school_years as $school_year)
                            <option value="{{ $school_year->scy_id }}"> {{ $school_year->scy_name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Kelas </label>
                        <select name="class_id" class="form-control" id="classes">
                            <option value="" selected disabled>
                            @foreach($student->student_classes as $a)
                            {{ getFormatClass($a->stc_class_id) }}
                            @endforeach
                            </option>

                        </select>
                    </div>
                    <button type=" submit" class="btn btn-gradient-primary mr-2">Simpan</button>
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
<script src="{{ URL::to('vendor/be/assets/vendors/datepicker/datepicker.js') }}"></script>
<script>
    $('.date_picker').datepicker({
        autoclose: true,
        todayHighlight: true
    });
</script>

<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#tampil_picture').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#preview_gambar").change(function() {
        bacaGambar(this);
    });
</script>
<script>
    $('#school_year').on('change', function(e) {
        console.log(e);
        var scy_id = e.target.value;
        $.get('/get/classes/' + scy_id,
            function(data) {
                $('#classes').empty();
                $('#classes').append('<option value="">-- Pilih kelas --</option>');

                $.each(data.classes, function(index, classObj) {
                    $('#classes').append('<option value="' + classObj.cls_id + '">' + classObj.grl_name + '&nbsp' + classObj.mjr_name + '&nbsp' + classObj.cls_number + '</option>');
                });
            });
    });
</script>
@endpush