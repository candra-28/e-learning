@extends('back-learning.layouts.master')

@push('title')
- Pengumuman
@endpush

@push('styles')
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/vendors/css/vendor.bundle.base.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/be/assets/css/style.css')}}">
<link rel="shortcut icon" href="{{ URL::to('vendor/be/assets/images/logo-atas.png')}}">
<script src="{{ URL::to('vendor/be/assets/dataTable/ajax_jquery.js') }}"></script>
@endpush

@section('content')
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-voice"></i>
    </span> Pengumuman
  </h3>
</div>

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

<div class="form-group">
  <form class="form-inline" method="get" action="{{ url('announcement/search') }}">
    <div class="input-group">
      <input name="slug" type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn btn-sm btn-gradient-primary" type="submit">Search</button>
      </div>
    </div>
  </form>
</div>

<div class="text-right">
  <a href="{{ url('announcement/create') }}" type="button" data-toggle="tooltip" data-placement="left" title="Tambah Pengumuman" class="btn btn-primary btn-sm mb-2"><i class="mdi mdi-plus-box"></i></a>
</div>

<div class="row" id="announcement">
  @foreach($announcements as $announcement)
  <div class="col-md-4 stretch-card grid-margin announcement">
    <div class="card bg-gradient-danger card-img-holder">
      <div class="card-body">
        <h2 class="font-weight-normal mb-3 text-center">{{ $announcement->acm_title }}</i>
          </h4>
          <h2 class="text-center mb-5"><img src="{{ asset($announcement->acm_upload_file) }}" style="border-radius: 10px; max-width: 100%; width: 200px; height: 200px;" alt="null"></h2>
          <div class="btn-group-vertical" role="group" aria-label="Basic example">
            <div class="btn-group text-center">
              <button type="button" style="left: 30%;" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Opsi </button>
              <div class="dropdown-menu" x-placement="bottom-start" style="cursor:default; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 44px, 0px);">
                <a href="{{ url('announcement/'.$announcement->acm_id) }}" class="dropdown-item">Selengkapnya</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item">Edit Pengumuman</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item">Ubah Status</a>
              </div>

            </div>
          </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
{{ $announcements->links() }}

@push('scripts')
<script src="{{URL::to('vendor/be/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/off-canvas.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/misc.js')}}"></script>
<script src="{{URL::to('vendor/be/assets/js/todolist.js')}}"></script>

<!-- <script type="text/javascript">
  $(window).on('hashchange', function() {
    if (window.location.hash) {
      var page = window.location.hash.replace('#', '');
      if (page == Number.NaN || page <= 0) {
        return false;
      } else {
        getData(page);
      }
    }
  });

  $(window).on('paginate a', function() {
    if (window.location.hash) {
      var page = window.location.hash.replace('#', '');
      console.log(page)
      if (page == Number.NaN || page <= 0) {
        return false;
      } else {
        getData(page);
      }
    }
  });

  $(document).ready(function() {
    $(document).on('click', '.pagination a', function(event) {
      // console.log('ahmad')
      event.preventDefault();
      // console.log(event.preventDefault())
      $('li').removeClass('active');
      $(this).parent('li').addClass('active');

      var myurl = $(this).attr('href');
      // console.log(myurl)
      var page = $(this).attr('href').split('page=')[1];
      // console.log(page)
      getData(page);
    });

  });

  function getData(page) {
    console.log(page)
    $.ajax({
      url: '?page=' + page,
      type: "GET",
      datatype: "html"
    }).done(function(data) {
      $("#announcement").empty().html(data);
      location.hash = page;
    });
  }
</script> -->
@endpush
@endsection