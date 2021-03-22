@extends('back-learning.layouts.master')

@push('title')
- Buat Pengumuman
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
    </span> Buat Pengumuman
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
        <h4 class="card-title">Buat Pengumuman</h4>
        <p class="card-description"> Masukan Pengumuman Yang Akan Anda Buat </p>
        <form class="add-announcement" action="{{ url('announcement/create') }}" method="post" autocomplete="off" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="exampleInputName1">Judul</label>
            <input type="text" name="acm_title" class="form-control" value="{{ old('acm_title') }}" placeholder="Masukan Judul Pengumuman">
            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <h6 class="text-center">File Pengumuman</h6>
          <div class="row mt-3">
            <div class="col-12 mb-4">
              <div class="text-center mb-2">
                <img id="tampil_picture" style="object-fit: cover; height: 200px; width:230px; text-align:center;">
              </div>
              <div class="text-center">
                <input accept="image/x-png,image/gif,image/jpeg" type="file" name="acm_upload_file" id="preview_gambar" onchange="document.getElementById('acm_upload_file').value=this.value" /><br>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="exampleTextarea1">Deskripsi</label>
            <textarea name="acm_description" class="form-control ckeditor" placeholder="Masukan Pesan Pengumuman" value="{{ old('acm_description') }}"></textarea>
            @error('acm_description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <button type="submit" class="btn btn-gradient-primary mr-2">Simpan</button>
        </form>
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

<script src="{{ URL::to('vendor/be/assets/js/file-upload.js')}}"></script>
<script type="text/javascript" src="{{ URL::to('vendor/be/assets/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript" src="{{ URL::to('vendor/be/assets/ckeditor/adapters/jquery.js')}}"></script>
<script type="text/javascript">
  $('textarea.texteditor').ckeditor();
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
@endsection