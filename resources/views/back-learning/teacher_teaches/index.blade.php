@extends('back-learning.layouts.master')

@push('title')
- Daftar Guru mengajar
@endpush

@push('styles')
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/css/vendor.bundle.base.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('vendor/be/assets/dataTable/jquery_dataTable.min.css') }}">
<script src="{{ URL::to('vendor/be/assets/dataTable/ajax_jquery.js') }}"></script>
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css"> -->
@endpush

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi mdi-account-card-details"></i>
        </span> Guru Mengajar
    </h3>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar guru mengajar</h4>
                <div class="text-right">
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm mb-3" onclick="addTeacherTeach()"><i class="mdi mdi-plus-box"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-hover" id="teacher_teaches" style="width:100%">
                        <thead class="text-uppercase" style="background-color: #BF00FF;">
                            <tr class="text-white">
                                <th scope="col" class="sort" data-sort="name">No</th>
                                <th scope="col" class="sort" data-sort="budget">Nama</th>
                                <th scope="col" class="sort" data-sort="budget">Mata pelajaran</th>
                                <th scope="col" class="sort" data-sort="budget">Kelas</th>
                                <th scope="col" class="sort" data-sort="budget">Status</th>
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

<div class="modal fade" id="subject-modal" aria-hidden="false" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form id="form-subject" class="form-horizontal subject-form">
                    <input type="hidden" name="tct_id" id="tct_id">
                    <input type="hidden" name="tct_is_active" id="tct_is_active">
                    <div class="form-group">
                        <label for="name" class="col-sm-12">Nama Guru</label>
                        <div class="col-sm-12">
                            <select name="tct_teacher_id" id="tct_teacher_id" class="form-control">
                            <option value="" selected>-- pilih guru --</option>
                            @foreach($teachers as $teacher)
                            <option value="{{ $teacher->tcr_id }}">{{ $teacher->user->usr_name }}</option>
                            @endforeach
                            </select>
                            <span id="tct_teacher_id" class="alert-message text-danger"></span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-12">Kelas</label>
                        <div class="col-sm-12">  
                        <select name="tct_class_id" id="tct_class_id" class="form-control">
                            <option value="" selected>-- pilih kelas --</option>
                            @foreach($classes as $class)
                            <option value="{{ $class->cls_id }}">{{ $class->grade_level->grl_name }} {{ $class->major->mjr_name }} {{ $class->cls_number }}</option>
                            @endforeach
                            </select>
                            <span id="tct_class_id" class="alert-message text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-12">Mata pelajaran</label>
                        <div class="col-sm-12">
                        <select name="tct_subject_id" id="tct_subject_id" class="form-control">
                            <option value="" selected>-- pilih mata pelajaran --</option>
                            @foreach($subjects as $subject)
                            <option value="{{ $subject->sbj_id }}">{{ $subject->sbj_name }}</option>
                            @endforeach
                            </select>
                            <span id="tct_subject_id" class="alert-message text-danger"></span>
                        </div>
                        
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm a" name="btn-save" onclick="createTeacherTeach()">Simpan</button>
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
<script src="{{ URL::to('vendor/be/assets/js/sweetalert.min.js') }}"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script> -->
@endpush
@endsection