@extends('layouts.master')

@push('title')
- Beranda
@endpush

@push('styles')


<link rel="stylesheet" href="{{URL::to('vendor/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/assets/vendors/css/vendor.bundle.base.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/assets/css/style.css')}}">
<link rel="shortcut icon" href="{{ URL::to('vendor/assets/images/logo-atas.png')}}">

<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@endpush

@section('content')
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-pinterest"></i>
    </span> Role
  </h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">E - Learning</a></li>
      <li class="breadcrumb-item active" aria-current="page">Role</li>
    </ol>
  </nav>
</div>
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Daftar Role</h4>
        <div class="text-right">
          <button type="button" class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><i class="mdi mdi-plus-box"></i></button>
        </div>
        <table class="table align-items-center table-flush" id="example" style="width:100%">
          <thead class="text-uppercase" style="background-color:  #BF00FF;">
            <tr class="text-white">
              <th scope="col" class="sort" data-sort="name">No</th>
              <th scope="col" class="sort" data-sort="budget">Name</th>
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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat Role Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if (count($errors) > 0)
        <blockquote class="blockquote blockquote-danger">
          @foreach ($errors->all() as $error)
          <footer class="blockquote-footer">Nama Role Wajib Terisi ! <cite title="Source Title"></cite></footer>
          @endforeach
        </blockquote>
        @endif
        <form action="{{ url('role/create') }}" class="needs-validation" novalidate method="post" autocomplete="off">
          @csrf
          <div class="form-group">
            <label class="col-form-label">Nama Role:</label>
            <input type="text" name="name" id="validationCustom03" class="form-control">

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

<script src="{{URL::to('vendor/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{URL::to('vendor/assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{URL::to('vendor/assets/js/off-canvas.js')}}"></script>
<script src="{{URL::to('vendor/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{URL::to('vendor/assets/js/misc.js')}}"></script>
<script src="{{URL::to('vendor/assets/js/dashboard.js')}}"></script>
<script src="{{URL::to('vendor/assets/js/todolist.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var table = $('#example').dataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ url('roles')}}",
      columns: [{
          data: 'DT_RowIndex',
          name: 'DT_RowIndex',
          orderable: false,
          searchable: false
        },
        {
          data: 'name',
          name: 'name'
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        },
      ]
    });
  });

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