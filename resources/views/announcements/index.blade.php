@extends('layouts.master')

@push('title')
- Announcement
@endpush

@push('styles')
<link rel="stylesheet" href="{{URL::to('vendor/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/assets/vendors/css/vendor.bundle.base.css')}}">
<link rel="stylesheet" href="{{URL::to('vendor/assets/css/style.css')}}">
<link rel="shortcut icon" href="{{ URL::to('vendor/assets/images/logo-atas.png')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
@endpush

@section('content')
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-voice"></i>
    </span> Pengumuman
  </h3>
</div>


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



<div class="wrapper">
  <div class="carousel owl-carousel">
    @foreach($announcements as $announcement)
    <div class="grid-margin stretch-card">
      <div class="card" style="height: 400px;">
        <div class="card-body">
          <h4 class="card-title text-center">{{ $announcement->title }}
            <img src="{{ asset('announcement/'.$announcement->name . '/' . $announcement->upload_type) }}" alt="NULL" style="margin-top: 20px; border-radius: 5px;">
          </h4>
          <form action="{{ url('announcement/'.$announcement->id )}}" method="post">
            <a href="{{ url('announcement/'.$announcement->id) }}" class="btn btn-primary btn-sm">Selengkapnya</a>
            @if(Auth()->user()->role_id == 1)
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
            <input type="hidden" name="_method" value="DELETE">
            @else
            @endif
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@push('scripts')
<script src="{{URL::to('vendor/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{URL::to('vendor/assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{URL::to('vendor/assets/js/off-canvas.js')}}"></script>
<script src="{{URL::to('vendor/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{URL::to('vendor/assets/js/misc.js')}}"></script>
<script src="{{URL::to('vendor/assets/js/todolist.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
  $(".carousel").owlCarousel({
    margin: 20,
    loop: true,
    autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1,
        nav: false
      },
      600: {
        items: 2,
        nav: false
      },
      1000: {
        items: 3,
        nav: false
      }
    }
  });
</script>
@endpush
@endsection