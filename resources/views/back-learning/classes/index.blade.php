@extends('back-learning.layouts.master')

@push('title')
- Daftar Kelas
@endpush

@push('styles')
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/css/vendor.bundle.base.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/css/style.css')}}">

<link rel="stylesheet" type="text/css" href="{{ URL::to('vendor/be/assets/dataTable/jquery_dataTable.min.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@endpush

@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-home-modern"></i>
        </span> Kelas
    </h3>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Kelas</h4>
                <div class="text-right">
                    <button type="button" class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><i class="mdi mdi-plus-box"></i></button>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="classes" style="width:100%">
                        <thead class="text-uppercase" style="background-color:  #BF00FF;">
                            <tr class="text-white">
                                <th scope="col" class="sort" data-sort="name">No</th>
                                <th scope="col" class="sort" data-sort="budget">Name</th>
                                <th scope="col" class="sort" data-sort="budget">Tahun Ajaran</th>
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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Kelas Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    Nama Kelas Wajib Terisi !
                    @endforeach
                </div>
                @endif

                @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
                @endif

                <form action="{{ url('class/sdf') }}" class="add-class" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label class="col-form-label">Nama Kelas:</label>
                        <input type="text" name="name" placeholder="Masukan nama" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
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

<script src="{{ URL::to('vendor/be/assets/dataTable/jquery_dataTable.min.js') }}"></script>
<script src="{{ URL::to('vendor/be/assets/dataTable/dataTable.js') }}"></script>

<script src="{{ URL::to('vendor/be/assets/js/sweetalert.min.js') }}"></script>
<script>
    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('whatever')
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input').val(recipient)
    });
</script>
@endpush
@endsection