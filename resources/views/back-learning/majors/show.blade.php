@extends('back-learning.layouts.master')

@push('title')
- Detail Jurusan
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
        </span> Detail Jurusan
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
                <h4 class="card-title text-center">Detail Jurusan </h4>


                <!-- <div class="row mt-3">
                    <div class="col-12 mb-4">
                        <div class="tect-center mb-2">
                            <img id="tampil_picture" src="{{ asset($major->mjr_thumnail) }}" style="object-fit: cover; height: 200px; width:230px; text-align:center;">
                        </div>
                        <input accept="image/x-png,image/gif,image/jpeg" value="{{ $major->mjr_thumnail }}" type="file" name="mjr_thumnail" id="preview_gambar" style="border-radius: 5px;" onchange="document.getElementById('usr_profile_picture').value=this.value" /><br>
                    </div>
                </div> -->

                <dt>Thumnail Jurusan</dt>
                <div class="row mt-3">
                    <div class="col-6 pl-1" style="left: 25%;">
                        <img src="{{ asset($major->mjr_thumnail) }}" class="mb-2 mw-100 w-100 rounded" alt="image">

                    </div>
                </div>

                <dt class="col-sm-12">Nama Jurusan</dt>
                <dd class="col-sm-12">
                    <p style="font-family: sans-serif; font-size: 18px;">{{ $major->mjr_name }}</p>
                </dd>

                <dt class="col-sm-12">Deskripsi Jurusan</dt>
                <dd class="col-sm-12">
                    @if(isset($major->mjr_description))
                    <p style="font-family: sans-serif; font-size: 18px;">{!! $major->mjr_description !!}</p>
                    @else
                    <p style="font-family: sans-serif; font-size: 18px;">Tidak ada deskripsi</p>
                    @endif
                </dd>

                <dt class="col-sm-12">Status Jurusan</dt>
                <dd class="col-sm-12">
                    @if($major->mjr_is_active == 0)
                    <p><label class="badge badge-gradient-danger">TIDAK AKTIF</label></p>
                    @else
                    <p><label class="badge badge-gradient-success">AKTIF</label></p>
                    @endif
                </dd>

                <dt class="col-sm-12">Dibuat Oleh</dt>
                <dd class="col-sm-12">
                    <p style="font-family: sans-serif; font-size: 18px;">{{ $major->user->usr_name }}</p>
                </dd>

                <dt class="col-sm-12">Tanggal di buat</dt>
                <dd class="col-sm-12">
                    <p style="font-family: sans-serif; font-size: 18px;">{{ getDateFormat($major->mjr_created_at) }}</p>
                </dd>

                <dd class="col-sm-12">
                    <p style="font-family: sans-serif; font-size: 18px;"><a href="{{ url('majors') }}" class="btn btn-gradient-primary">Kembali</a></p>
                </dd>

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