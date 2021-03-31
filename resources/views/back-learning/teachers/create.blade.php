@extends('back-learning.layouts.master')

@push('title')
- Buat Guru
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
        </span> Guru
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
                <h4 class="card-title">Buat Guru Baru</h4>
                <p class="card-description"> Masukan data guru yang akan anda buat</p>
                <form action="{{ url('teacher/create') }}" method="post" autocomplete="off" class="add-teacher" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-12 mb-4">
                            <p class="text-center mb-2">Profile Guru</p>
                            <div class="text-center mb-2">
                                <img id="tampil_picture" style="object-fit: cover; height: 200px; width:230px; text-align:center;">
                            </div>
                            <div class="text-center">
                                <input accept="image/x-png,image/gif,image/jpeg" type="file" name="usr_profile_picture" id="preview_gambar" onchange="document.getElementById('usr_profile_picture').value=this.value" /><br>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama guru <span class="text-danger">*</span></label>
                        <input type="text" name="usr_name" class="form-control" value="{{ old('usr_name') }}" placeholder="Masukan nama guru">
                    </div>
                    
                    <div class="form-group">
                        <label>Alamat email <span class="text-danger">*</span></label>
                        <input type="text" name="usr_email" value="{{ old('usr_email') }}" class="form-control" placeholder="Masukan tempat lahir">
                    </div>

                    <div class="form-group">
                        <label>Nomor telepon <span class="text-danger">*</span></label>
                        <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="{{ old('usr_phone_number') }}" type="text" name="usr_phone_number" class="form-control" placeholder="Masukan nomor telepon">
                    </div>

                    <div class="form-group">
                        <label>NIP <span class="text-danger">*</span></label>
                        <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="{{ old('stu_nis') }}" type="text" name="tcr_nip" class="form-control" placeholder="Masukan Induk kepegawaian">
                    </div>

                    <div class="form-group">
                    <label>Tahun masuk <span class="text-danger">*</span></label>
                    <input type="text" name="tcr_entry_year" class="form-control year_picker" placeholder="Masukan tahun masuk">
                    </div>
                    <div class="form-group">
                        <label>Jenis kelamin</label>
                        <div class="col-sm-4">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="usr_gender" value="Pria" value="{{ old('gender') }}"> Pria <i class="input-helper"></i></label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="usr_gender" value="Perempuan" value="{{ old('gender') }}"> Wanita <i class="input-helper"></i></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tempat lahir</label>
                        <input type="text" name="usr_place_of_birth" value="{{ old('usr_place_of_birth') }}" class="form-control" placeholder="Masukan tempat lahir">
                    </div>
                    <div class="form-group">
                        <label>Tanggal lahir</label>
                        <input class="form-control date_picker" value="{{ old('usr_date_of_birth') }}" name="usr_date_of_birth" placeholder="dd\mm\yyy"></input>
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <select name="usr_religion" class="form-control">
                            <option selected disabled>-- Pilih Agama --</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="usr_address" value="{{ old('usr_address') }}" class="form-control" placeholder="Masukan alamat lengkap" rows="7"></textarea>
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
    $('.year_picker').datepicker({
        autoclose: true,
        minViewMode: 2,
        format: 'yyyy',
        orientation: "auto",
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

@endpush