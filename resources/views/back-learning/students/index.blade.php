@extends('back-learning.layouts.master')

@push('title')
- Daftar Siswa
@endpush

@push('styles')


<link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/css/vendor.bundle.base.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/css/style.css')}}">
<link rel="shortcut icon" href="{{ URL::to('vendor/be/assets/images/logo-atas.png')}}">

<link rel="stylesheet" type="text/css" href="{{ URL::to('vendor/be/assets/dataTable/jquery_dataTable.min.css') }}">
<script src="{{ URL::to('vendor/be/assets/dataTable/ajax_jquery.js') }}"></script>
@endpush

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account-card-details"></i>
        </span> Siswa
    </h3>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Siswa</h4>
                <div class="text-right">
                    <a href="{{ url('student/create') }}" type="button" class="btn btn-primary btn-sm mb-2"><i class="mdi mdi-plus-box"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-hover" id="students" style="width:100%">
                        <thead class="text-uppercase" style="background-color: #BF00FF;">
                            <tr class="text-white">
                                <th scope="col" class="sort" data-sort="name">No</th>
                                <th scope="col" class="sort" data-sort="budget">Avatar</th>
                                <th scope="col" class="sort" data-sort="budget">Nis</th>
                                <th scope="col" class="sort" data-sort="budget">Name</th>
                                <th scope="col" class="sort">Status</th>
                                <th scope="col">Action</th>
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


@push('scripts')

<script src="{{URL::to('vendor/be/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/off-canvas.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/misc.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/todolist.js')}}"></script>

<script src="{{ URL::to('vendor/be/assets/dataTable/jquery_dataTable.min.js') }}"></script>
<script src="{{ URL::to('vendor/be/assets/dataTable/dataTable.js') }}"></script>

<script src="{{ URL::to('vendor/be/assets/js/sweetalert.min.js') }}"></script>
@endpush
@endsection