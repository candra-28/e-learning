@extends('back-learning.layouts.master')

@push('title')
- Profile
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
            <i class="mdi mdi-account"></i>
        </span> Profile
    </h3>
</div>

<div class="row">
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    @if(isset($user->usr_profile_picture))
                    <img src="{{ url('profile_picture/'.$user->name.'/'.$user->profile_picture) }}" id="tampil_picture" style="object-fit: cover; height: 200px; width: 200px; border-radius:5px;" />
                    @else
                    <img src="{{ asset('profile_picture/avatar-2.png')}}" id="tampil_picture" style="object-fit: cover; height: 200px; width: 200px; border-radius:5px;" />
                    @endif
                </div>
                <!--  <div class="text-center">
                  <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(isset($user->usr_profile_picture))
                     <img src="{{ url('profile_picture/'.$user->name.'/'.$user->profile_picture) }}" id="tampil_picture" style="object-fit: cover; height: 200px; width: 200px; border-radius:5px;" />
                    @else
                    <img src="{{ asset('profile_picture/avatar-2.png')}}" id="tampil_picture" style="object-fit: cover; height: 200px; width: 200px; border-radius:5px;" />
                    @endif
                   
                    <input type="file" name="profile_picture" id="preview_gambar" class="img-thumbnail" style="display:none; border-radius: 5px;" onchange="document.getElementById('usr_profile_picture').value=this.value" /><br>

                    <button type="button" id="usr_profile_picture" class="btn btn-outline-primary btn-sm m-2" onclick="document.getElementById('preview_gambar').click()">Pilih Gambar</button>
                    
                    <input type="submit" value="Simpan" class="btn btn-outline-success btn-sm">
                  </form>   
              </div> -->

            </div>

            <div class="card-body">
                <!--                 <hr>
                    <h4 class="font-medium text-center" style="font-family: sans-serif;">Akun</h4>
                <hr>
 -->
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
                                <p>{{ $user->usr_date_of_birth }}</p>
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
                        @elseif($role->rol_id == 3)
                        <hr>
                        <h4 class="font-medium m-t-30">Riwayat Mengajar pelajaran</h4>
                        <hr>

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
                        @else

                        @endif
                    </div>
                </div>
                <div class="tab-pane show" id="setting_profile" role="tabpanel">
                    <div class="card-body">

                    </div>
                </div>

                <div class="tab-pane show" id="setting_email" role="tabpanel">
                    <div class="card-body">

                    </div>
                </div>

                <div class="tab-pane show" id="setting_password" role="tabpanel">
                    <div class="card-body">
                        <form class="form-horizontal form-material edit-password" method="POST" action="{{ url('profile/update-password') }}">
                            @csrf
                            @if (Session::has('success'))
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="alert alert-success col-md-12">
                                        {{ Session::get('success') }}
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if (Session::has('error'))
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="alert alert-danger col-md-12">
                                        {{ Session::get('error') }}
                                    </div>
                                </div>
                            </div>
                            @endif
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
<script src="{{URL::to('vendor/be/assets/js/todolist.js')}}"></script>

<script src="{{URL::to('vendor/fe/assets/vendor/validator/jquery.validate.js')}}"></script>
<script src="{{URL::to('vendor/fe/assets/vendor/validator/validator-init.js')}}"></script>

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
@endsection