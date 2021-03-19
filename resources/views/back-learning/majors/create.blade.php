@extends('back-learning.layouts.master')

@push('title')
- Buat Jurusan
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
            <i class="mdi mdi-school"></i>
        </span> Buat Jurusan
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
                <h4 class="card-title">Buat Jurusan Baru</h4>
                <p class="card-description"> Masukan jurusan yang akan anda buat</p>
                <form action="{{ url('major/create') }}" method="post" autocomplete="off" class="add-major" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-12 mb-4">
                            <div class="tect-center mb-2">
                                <img id="tampil_picture" style="object-fit: cover; height: 200px; width:230px; text-align:center;">
                            </div>
                            <input accept="image/x-png,image/gif,image/jpeg" type="file" name="mjr_thumnail" id="preview_gambar" style="border-radius: 5px;" onchange="document.getElementById('usr_profile_picture').value=this.value" /><br>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Jurusan</label>
                        <input type="text" name="mjr_name" class="form-control" placeholder="Masukan nama jurusan">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Jurusan</label>
                        <textarea name="mjr_description" class="texteditor"></textarea>
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