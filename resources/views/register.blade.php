<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Register E-Learning</title>

  <link rel="stylesheet" href="{{URL::to('vendor/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{URL::to('vendor/assets/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{URL::to('vendor/assets/css/style.css')}}">
  <link rel="shortcut icon" href="{{URL::to('vendor/assets/images/logo-atas.png')}}" />

</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo text-center">
                <img src="{{URL::to('vendor/assets/images/3.svg')}}">
              </div>
              <h4>Baru disini?</h4>
              <h6 class="font-weight-light">Mendaftar itu mudah. Hanya perlu beberapa langkah. Pilihlah salah satu Tab dibawah</h6>

              <div class="card">
                <ul class="nav nav-tabs profile-tab" role="tablist">
                  <li class="nav-item"> <a class="nav-link show active" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Siswa</a> </li>
                  <li class="nav-item"> <a class="nav-link show" data-toggle="tab" href="#settings" role="tab" aria-selected="true">Guru</a> </li>
                </ul>

                <div class="tab-content">
                  <div class="tab-pane show active" id="profile" role="tabpanel">
                    <form class="forms-sample pt-3">

                      <div class="form-group">
                        <label for="exampleInputUsername1">Nomor Induk Siswa</label>
                        <input type="text" class="form-control" placeholder="NIS">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Nama">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Kata Sandi <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" placeholder="Kata Sandi">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1"> <span class="text-danger">*</span> Ulangi Kata Sandi</label>
                        <input type="password" class="form-control" placeholder="Ulangi Sandi">
                      </div>

                      <div class="form-group">
                        <label>Tahun Masuk <span class="text-danger">*</span></label>
                        <select name="" id="" class="form-control">
                          <option value="">2020</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Kelas <span class="text-danger">*</span></label>
                        <select name="" id="" class="form-control">
                          <option value="">XII</option>
                        </select>
                      </div>

                      <div class="control-group">
                        <label class="control-label">Jenis Kelamin <span class="text-error">*</span></label>
                        <div class="form-check">
                          <label class="form-check-label inline"><input type="radio" name="gender" value="Laki-laki"> Laki-laki</label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label inline"><input type="radio" name="gender" value="Perempuan"> Perempuan</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="name_of_birth">Tempat Lahir</label>
                        <input type="text" class="form-control" placeholder="Kota Lahir">
                      </div>

                      <div class="form-group">
                        <label for="name_of_birth">Tanggal, Bulan, Tahun Lahir</label>
                        <input type="text" class="date form-control" placeholder="Kota Lahir">
                      </div>

                      <div class="form-group">
                        <label for="name_of_birth">Agama</label>
                        <select name="religion" class="form-control">
                          <option selected disabled>-- Pilih Agama --</option>
                          <option value="Islam">Islam</option>
                          <option value="Kristen">Kristen</option>
                          <option value="Katolik">Katolik</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Budha">Budha</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="name_of_birth">Alamat Lengkap</label>
                        <input type="text" class="form-control" placeholder="Alamat">
                      </div>


                      <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">DAFTAR</button>
                    </form>
                  </div>


                  <div class="tab-pane show" id="settings" role="tabpanel">
                    <form action="{{ route('login') }}" method="post" class="pt-3">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputUsername1">Nomor Identitas Pegawai</label>
                        <input type="text" class="form-control" placeholder="NIP">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Nama">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Kata Sandi <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" placeholder="Kata Sandi">
                      </div>

                      <div class="control-group">
                        <label class="control-label">Jenis Kelamin <span class="text-error">*</span></label>
                        <div class="form-check">
                          <label class="form-check-label inline"><input id="membershipRadios1" type="radio" name="gender" value="Laki-laki"> Laki-laki</label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label inline"><input type="radio" name="gender" value="Perempuan"> Perempuan</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="name_of_birth">Tempat Lahir</label>
                        <input type="text" class="form-control" placeholder="Kota Lahir">
                      </div>

                      <div class="form-group">
                        <label for="name_of_birth">Tanggal, Bulan, Tahun Lahir</label>
                        <input type="text" class="form-control" placeholder="Kota Lahir">
                      </div>

                      <div class="form-group">
                        <label for="name_of_birth">Alamat Lengkap</label>
                        <input type="text" class="form-control" placeholder="Alamat">
                      </div>
                      <div class="mt-3">
                        <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">DAFTAR</button>
                      </div>

                    </form>
                  </div>
                </div>
              </div>

              <div class="text-center mt-4 font-weight-light"> Anda sudah memiliki akun? <a href="{{ route('login') }}" class="text-primary">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{URL::to('vendor/assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{URL::to('vendor/assets/js/off-canvas.js')}}"></script>
  <script src="{{URL::to('vendor/assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{URL::to('vendor/assets/js/misc.js')}}"></script>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>