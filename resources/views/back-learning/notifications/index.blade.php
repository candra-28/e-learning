@extends('back-learning.layouts.master')

@push('title')
- Notifikasi
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
            <i class="mdi mdi-bell-outline"></i>
        </span> Notifikasi
    </h3>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
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
                <h4 class="card-title">Daftar Notifikasi</h4>
                <div class="text-right">
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm mb-3" id="create-new-notification" onclick="addNotification()"><i class="mdi mdi-plus-box"></i></a></a>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-hover" id="notification" style="width:100%">
                        <thead class="text-uppercase" style="background-color: #BF00FF;">
                            <tr class="text-white">
                                <th scope="col" class="sort" data-sort="name">No</th>
                                <th scope="col" class="sort" data-sort="budget">Judul</th>
                                <th scope="col" class="long" data-sort="budget">Pesan</th>
                                <th scope="col" class="sort">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="post-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('notification/create') }}" class="form-horizontal add-notification" method="POST" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-sm-2">Judul</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="not_title" name="not_title" placeholder="Masukan judul">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2">Tujuan</label>
                        <div class="col-sm-12">
                            <select name="not_to_role_id" class="form-control">
                                <option selected disabled>-- pilih --</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->rol_id }}">{{ $role->rol_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2">Pesan</label>
                        <div class="col-sm-12">
                            <textarea name="not_message" cols="30" rows="10" placeholder="Masukan pesan notifikasi" class="form-control"></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="crud-modal-show" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr height="50px">
                            <td><strong>Pembuat:</strong></td>
                            <td id="from_name"></td>
                        </tr>
                        <tr height="50px">
                            <td><strong>Judul:</strong></td>
                            <td id="title"></td>
                        </tr>
                        <tr height="50px">
                            <td><strong>Pesan:</strong></td>
                            <td class="text-wrap" id="message"></td>
                        </tr>
                        <tr height="50px">
                            <td><strong>Ditujukan Pada:</strong></td>
                            <td id="to_name"></td>
                        </tr>
                        <tr height="50px">
                            <td><strong>Dibuat Pada:</strong></td>
                            <td id="created_at"></td>
                        </tr>
                        <tr height="50px">
                            <td><strong>Status Notifikasi:</strong></td>
                            <td id="is_active"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Kembali</button>
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
<script>
    function addNotification() {
        $('#post-modal').modal('show');
    }
</script>
<script>
    $(document).ready(function() {
        notifications()
    });
</script>
@endpush
@endsection