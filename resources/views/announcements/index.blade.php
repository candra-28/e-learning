@extends('layouts.master')

@push('title')
- Announcement
@endpush

@push('styles')
   <link rel="stylesheet" href="{{URL::to('vendor/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('vendor/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{URL::to('vendor/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ URL::to('vendor/assets/images/logo-atas.png')}}">

    <link rel="stylesheet" href="{{URL::to('vendor/assets/style.css')}}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
@endpush

@section('content')
    <div class="wrapper">
      <div class="carousel owl-carousel">
        <div class="grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Judul 1</h4>
                    <div class="media">
                      <i class="mdi mdi-earth icon-md text-info d-flex align-self-start mr-3"></i>
                      <div class="media-body">
                        <p class="card-text">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque.</p>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
        <div class="grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Judul 2</h4>
                    <div class="media">
                      <i class="mdi mdi-earth icon-md text-info d-flex align-self-start mr-3"></i>
                      <div class="media-body">
                        <p class="card-text">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque.</p>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
        <div class="grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Judul 3</h4>
                    <div class="media">
                      <i class="mdi mdi-earth icon-md text-info d-flex align-self-start mr-3"></i>
                      <div class="media-body">
                        <p class="card-text">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque.</p>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
        <div class="grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Judul 4</h4>
                    <div class="media">
                      <i class="mdi mdi-earth icon-md text-info d-flex align-self-start mr-3"></i>
                      <div class="media-body">
                        <p class="card-text">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque.</p>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
        <div class="grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Judul 5</h4>
                    <div class="media">
                      <i class="mdi mdi-earth icon-md text-info d-flex align-self-start mr-3"></i>
                      <div class="media-body">
                        <p class="card-text">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque.</p>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
      </div>
    </div>

@push('scripts')
  <script src="{{URL::to('vendor/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{URL::to('vendor/assets/vendors/chart.js/Chart.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{URL::to('vendor/assets/js/off-canvas.js')}}"></script>
    <script src="{{URL::to('vendor/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{URL::to('vendor/assets/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{URL::to('vendor/assets/js/dashboard.js')}}"></script>
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
          0:{
            items:1,
            nav: false
          },
          600:{
            items:2,
            nav: false
          },
          1000:{
            items:3,
            nav: false
          }
        }
      });
    </script>
@endpush   
@endsection
