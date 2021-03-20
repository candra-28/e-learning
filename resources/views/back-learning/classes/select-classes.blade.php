@extends('back-learning.layouts.master')

@push('title')
- Pilih kelas
@endpush

@push('styles')
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/css/style.css')}}">
@endpush

@section('content')
<div class="row" id="proBanner">
    <div class="col-12">
        <span class="d-flex align-items-center purchase-popup">
            <p>Anda diharapkan memilih kelas sesuai dengan kelas yang anda duduki sekarang, silahkan pilih kelas anda</p>
            <a class="purchase-button ml-auto"></a>
            <i class="mdi mdi-close" id="bannerClose"></i>
        </span>
    </div>
</div>

<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-home-modern"></i>
        </span> Pilih Kelas
    </h3>
</div>
<div class="row">
    @foreach($classes as $class)
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-primary card-img-holder text-white">
            <div class="card-body">
                <h4 class="font-weight-normal mb-3 text-center">{{ $class->grade_level->grl_name }} {{ $class->major->mjr_name }} {{ $class->cls_number }}
                </h4>
                <h6 class="text-center">{{ $class->school_year->scy_name }}</h6>
                <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{ $class->cls_id }}" class="btn btn-success btn-block btn-sm select_class"><span>Pilih kelas </span><i class="mdi mdi-pin"></i></a <a href="" style="max-width: 100%;" class="btn btn-success btn-block"></a>

            </div>
        </div>
    </div>
    @endforeach
</div>
@push('scripts')
<script src="{{URL::to('vendor/be/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/off-canvas.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/misc.js')}}"></script>
<script src="{{ URL::to('vendor/be/assets/js/dashboard.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/todolist.js')}}"></script>
<script src="{{ URL::to('vendor/be/assets/js/sweetalert.min.js') }}"></script>
<script>
    $('body').on('click', '.select_class', function() {

        var cls_id = $(this).data("id");
        let _token = $('meta[name="csrf-token"]').attr('content');

        swal({
                title: "Pilih Kelas",
                text: 'Apakah anda yakin ingin memilih kelas ini?',
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: 'POST',
                        url: 'select-classes/' + cls_id,
                        data: {
                            cls_id: cls_id,
                            _token: _token
                        },
                        success: function(data) {
                            if (data.status != false) {
                                swal(data.message, {
                                    button: false,
                                    icon: "success",
                                    timer: 1000
                                });
                            } else {
                                swal(data.message, {
                                    button: false,
                                    icon: "error",
                                    timer: 1000
                                });
                            }
                            window.location.href = 'dashboard';
                        },
                        error: function(error) {
                            console.log(error)
                            swal('Terjadi kegagalan sistem', {
                                button: false,
                                icon: "error",
                                timer: 1000
                            });
                        }
                    });
                }
            });
    });
</script>
@endpush
@endsection