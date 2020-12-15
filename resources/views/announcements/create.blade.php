@extends('layouts.master')

@push('title')
- Create Announcement
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
@endpush

@section('content')
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Form Input Announcements</h4>
                    <p class="card-description"> Input Your's Announcements </p>
                    <form class="forms-sample">
                        <div class="form-group">
                          <label for="exampleInputName1">Judul</label>
                          <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                        </div>
                        <div class="form-group">
                                <label>File upload</label>
                                <input type="file" name="img[]" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                  <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                  <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                  </span>
                                </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleTextarea1">Deskripsi</label>
                          <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                        </div>
                      <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
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
@endpush   
@endsection
