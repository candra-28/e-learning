@extends('back-learning.layouts.master')

@push('title')
- Daftar Mata Pelajaran
@endpush

@push('styles')
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/css/vendor.bundle.base.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('vendor/be/assets/dataTable/jquery_dataTable.min.css') }}">
<script src="{{ URL::to('vendor/be/assets/dataTable/ajax_jquery.js') }}"></script>

@endpush

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-library-books"></i>
        </span> Mata Pelajaran
    </h3>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Mata pelajaran</h4>
                <div class="text-right">
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm mb-3" onclick="addSubject()"><i class="mdi mdi-plus-box"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-hover" id="subjects" style="width:100%">
                        <thead class="text-uppercase" style="background-color: #BF00FF;">
                            <tr class="text-white">
                                <th scope="col" class="sort" data-sort="name">No</th>
                                <th scope="col" class="sort" data-sort="budget">Nama mapel</th>
                                <th scope="col" class="sort" data-sort="budget">Status</th>
                                <th scope="col" class="sort" data-sort="budget">Tanggal dibuat</th>
                                <th scope="col" class="sort" data-sort="budget">Action</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="subject-modal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form id="form-subject" class="form-horizontal subject-form">
                    <input type="hidden" name="sbj_id" id="sbj_id">
                    <input type="hidden" name="sbj_is_active" id="sbj_is_active">
                    <div class="form-group">
                        <label for="name" class="col-sm-12">Mata pelajaran</label>
                        <div class="col-sm-12">
                            <input autocomplete="off" type="text" class="form-control" id="sbj_name" name="sbj_name" placeholder="Masukan nama mata pelajaran">
                            <span id="sbjNameError" class="alert-message text-danger"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm a" name="btn-save" onclick="createSubject()">Simpan</button>
                <button class="btn btn-info btn-sm reset-btn" data-dismiss="modal">Kembali</button>
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
<script src="{{ URL::to('vendor/be/assets/dataTable/jquery_dataTable.min.js') }}"></script>
<script src="{{ URL::to('vendor/be/assets/dataTable/datatable.js') }}"></script>
<script src="{{URL::to('vendor/fe/assets/vendor/validator/jquery.validate.js')}}"></script>
<script src="{{ URL::to('vendor/be/assets/js/sweetalert.min.js') }}"></script>

<script>
    $(document).ready(function() {
        subjects()
    });
</script>
<script>
    function addSubject() {
        $("#sbj_id").val('');
        closeOnClickOutside: false,
            $('#subject-modal').modal('show');

    }

    function editSubject(event) {
        var id = $(event).data("id");
        let _url = `/subject/${id}`;
        $('#titleError').text('');

        $.ajax({
            url: _url,
            type: "GET",
            success: function(response) {
                if (response) {
                    $("#sbj_id").val(response.sbj_id);
                    $("#sbj_name").val(response.sbj_name);
                    $("#sbj_is_active").val(response.sbj_is_active);
                    $('#subject-modal').modal('show');
                }
            }
        });
    }

    function createSubject() {

        var sbj_name = $('#sbj_name').val();
        var sbj_is_active = $('#sbj_is_active').val();
        var id = $('#sbj_id').val();
        let _url = "{{URL::to('/')}}/subject/create";
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: _url,
            type: "POST",
            data: {
                sbj_id: id,
                sbj_name: sbj_name,
                sbj_is_active: sbj_is_active,
                _token: _token
            },

            success: function(response) {
                if (response.code == 200) {
                    $('#sbj_name').val('');
                    $('#subject-modal').modal('hide');
                    swal(response.message, {
                        button: false,
                        icon: "success",
                        timer: 1000
                    });
                    $('#subjects').DataTable().ajax.reload()
                }
            },
            error: function(response) {
                $('#sbjNameError').text(response.responseJSON.errors.sbj_name);

            },

        });
    }

    $(document).ready(function() {
        $(".reset-btn").click(function() {
            $("#form-subject").trigger("reset");
        });
    });
</script>
@endpush
@endsection