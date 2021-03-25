@extends('back-learning.layouts.master')

@push('title')
- Profile
@endpush

@push('styles')
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/css/vendor.bundle.base.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/css/style.css')}}">
<link href="{{ URL::to('vendor/be/assets/vendors/datepicker/datepicker.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account"></i>
        </span> Profile
    </h3>
</div>

@if (Session::has('success'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success col-md-12">
            {{ Session::get('success') }}
        </div>
    </div>
</div>
@endif
@if (Session::has('error'))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger col-md-12">
            {{ Session::get('error') }}
        </div>
    </div>
</div>
@endif

@error('new_usr_email')
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger col-md-12">
            {{ $message }}
        </div>
    </div>
</div>
@enderror

<div class="row">
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    @if(isset($user->usr_profile_picture))
                    <img src="{{ url($user->usr_profile_picture) }}" style="object-fit: cover; height: 200px; width: 200px; border-radius:5px;" />
                    @else
                    <img src="{{ asset('vendor/be/assets/images/profile_picture/avatar-2.png')}}" style="object-fit: cover; height: 200px; width: 200px; border-radius:5px;" />
                    @endif
                </div>
            </div>

            <div class="card-body">
                <dt class="col-sm-12">Nama</dt>
                <dd class="col-sm-12">
                    <p style="font-family: sans-serif; font-size: 18px;">{{ $user->usr_name }}</p>
                </dd>

                <dt class="col-sm-12">Email</dt>
                <dd class="col-sm-12">
                    <p style="font-family: sans-serif; font-size: 18px;">{{ $user->usr_email }}</p>
                </dd>

                <dt class="col-sm-12">Status akun</dt>
                <dd class="col-sm-12">
                    @if($user->usr_is_active == 1)
                    <p style="font-family: sans-serif; font-size: 18px;">aktif</p>
                    @else
                    <p style="font-family: sans-serif; font-size: 18px;">tidak aktif</p>
                    @endif
                </dd>

            </div>
        </div>
    </div>



    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link show" data-toggle="tab" href="#profile" role="tab" aria-selected="true">Profile</a> </li>

                <li class="nav-item"> <a class="nav-link show" data-toggle="tab" href="#setting_profile" role="tab" aria-selected="false">Ubah data profile</a> </li>

                <li class="nav-item"> <a class="nav-link show" data-toggle="tab" href="#setting_email" role="tab" aria-selected="true">Ubah alamat email</a> </li>

                <li class="nav-item"> <a class="nav-link show" data-toggle="tab" href="#setting_password" role="tab" aria-selected="false">Ubah Kata sandi</a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!--second tab-->
                <div class="tab-pane active show" id="profile" role="tabpanel">
                    <div class="card-body">
                        <div class="row">
                            <dt class="col-sm-4">Nomor Telepon</dt>
                            <dd class="col-sm-7">
                                <p>{{ $user->usr_phone_number }}</p>
                            </dd>

                            <dt class="col-sm-4">Jenis Kelamin</dt>
                            <dd class="col-sm-7">
                                <p>{{ $user->usr_gender }}</p>
                            </dd>

                            <dt class="col-sm-4">Tempat Lahir</dt>
                            <dd class="col-sm-7">
                                <p>{{ $user->usr_place_of_birth }}</p>
                            </dd>

                            <dt class="col-sm-4">Tanggal Lahir</dt>
                            <dd class="col-sm-7">
                                <p>{{ getDateFormat($user->usr_date_of_birth) }}</p>
                            </dd>

                            <dt class="col-sm-4">Agama</dt>
                            <dd class="col-sm-7">
                                <p>{{ $user->usr_religion }}</p>
                            </dd>

                            <dt class="col-sm-4">Alamat</dt>
                            <dd class="col-sm-7">
                                <p>{{ $user->usr_address }}</p>
                            </dd>
                        </div>
                        @if($role->rol_id == 4)
                        <hr>
                        <h4 class="font-medium m-t-30">Riwayat Kelas</h4>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="text-upercase" style="background-color: #00FFFF;">
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>X Multimedia 1</td>
                                        <td><label class="badge badge-danger">tidak aktif</label></td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>XI Multimedia 1</td>
                                        <td><label class="badge badge-success">aktif</label></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        @elseif($role->rol_id == 3)
                        <hr>
                        <h4 class="font-medium m-t-30">Riwayat Mengajar pelajaran</h4>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="text-upercase" style="background-color: #00FFFF;">
                                    <tr>
                                        <th>No</th>
                                        <th>Mata pelajaran</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Bahasa Indonesia</td>
                                        <td><label class="badge badge-success">aktif</label></td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Bahasa Inggris</td>
                                        <td><label class="badge badge-success">aktif</label></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        @else

                        @endif
                    </div>
                </div>
                <div class="tab-pane show" id="setting_profile" role="tabpanel">
                    <div class="card-body">
                        <form autocomplete="off" class="form-horizontal form-material update-profile" method="POST" action="{{ url('profile/profile-update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="col-md-12">
                                    @if(isset($user->usr_profile_picture))
                                    <div class="mb-0">
                                        <img src="{{ asset($user->usr_profile_picture) }}" id="tampil_picture" style="object-fit: cover; height: 200px; width: 200px; border-radius:5px;" />
                                    </div>
                                    @else
                                    <div class="mb-0">
                                        <img src="{{ asset('vendor/be/assets/images/profile_picture/avatar-2.png') }}" id="tampil_picture" style="object-fit: cover; height: 200px; width: 200px; border-radius:5px;" />
                                    </div>
                                    @endif
                                    <br class="mb-2">
                                    <input type="file" accept="image/x-png,image/gif,image/jpeg" name="usr_profile_picture" id="preview_gambar" onchange="document.getElementById('usr_profile_picture').value=this.value" /><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Nama</label>
                                <div class="col-md-12">
                                    <input type="text" name="usr_name" value="{{ $user->usr_name }}" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Nomor Telepon</label>
                                <div class="col-md-12">
                                    <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="{{ $user->usr_phone_number }}" class="form-control form-control-line" name="usr_phone_number">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12">Jenis Kelamin</label>
                                <div class="col-sm-6">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" value="Pria" class="form-check-input" name="usr_gender" id="usr_gender" {{ $user->usr_gender=='Pria'?'checked':'' }}> Pria <i class="input-helper"></i></label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" value="Perempuan" class="form-check-input" name="usr_gender" id="usr_gender" {{ $user->usr_gender=='Perempuan'?'checked':'' }}> Perempuan <i class="input-helper"></i></label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Tempat lahir</label>
                                <div class="col-md-12">
                                    <input type="text" name="usr_place_of_birth" value="{{ $user->usr_place_of_birth }}" class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Tanggal Lahir</label>
                                <div class="col-md-12">
                                    <input type="text" name="usr_date_of_birth" value="{{ getDateBirthday($user->usr_date_of_birth) }}" class="form-control form-control-line date_picker">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Agama</label>
                                <div class="col-md-12">
                                    <select name="usr_religion" class="form-control">
                                        <option selected>{{ $user->usr_religion }}</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Alamat</label>
                                <div class="col-md-12">
                                    <textarea name="usr_address" cols="30" rows="10" class="form-control">{{ $user->usr_address }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-primary">simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="tab-pane show" id="setting_email" role="tabpanel">
                    <div class="card-body">
                        <form class="form-horizontal form-material edit-email" autocomplete="off" method="POST" action="{{ url('profile/update-email') }}">
                            @csrf
                            <div class="row" id="proBanner">
                                <div class="col-12">
                                    <span class="d-flex align-items-center purchase-popup">
                                        <p style="color:orangered">Peringatan! Jika anda ingin mengubah alamat email, gunakan alamat email aktif!</p>
                                        <a class="purchase-button ml-auto"></a>
                                        <i class="mdi mdi-close" style="float: right;" id="bannerClose"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Alamat Email</label>
                                <div class="col-md-12">
                                    <input type="text" name="usr_email" value="{{ $user->usr_email }}" disabled class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Email Baru</label>
                                <div class="col-md-12">
                                    <input type="email" name="new_usr_email" placeholder="Masukan alamat email baru" class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="col-md-12 stretch-card grid-margin">
                                <div class="card bg-gradient-info card-img-holder text-white">
                                    <div class="card-body text-center">
                                        <h3>{{ $recaptha }}</h3>
                                        <input name="recaptha" type="hidden" value="{{ $recaptha }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Kode Verifikasi</label>
                                <div class="col-md-12">
                                    <input type="text" name="usr_verify" placeholder="Masukan kode di atas" class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-primary">simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="tab-pane show" id="setting_password" role="tabpanel">
                    <div class="card-body">
                        <form class="form-horizontal form-material edit-password" method="POST" action="{{ url('profile/update-password') }}">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-12">Kata sandi lama</label>
                                <div class="col-md-12">
                                    <input type="password" name="current_password" placeholder="sandi lama" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Kata sandi baru</label>
                                <div class="col-md-12">
                                    <input type="password" id="new_password" placeholder="sandi baru" class="form-control form-control-line" name="new_password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Ulangi kata sandi</label>
                                <div class="col-md-12">
                                    <input type="password" name="new_password_confirmation" placeholder="ulangi sandi" class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-primary">simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
<script src="{{ URL::to('vendor/be/assets/js/dashboard.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/todolist.js')}}"></script>

<script src="{{URL::to('vendor/fe/assets/vendor/validator/jquery.validate.js')}}"></script>
<script src="{{URL::to('vendor/fe/assets/vendor/validator/validator-init.js')}}"></script>
<script src="{{ URL::to('vendor/be/assets/vendors/datepicker/datepicker.js') }}"></script>
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
    $('.date_picker').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    });
</script>
@endpush
@endsection