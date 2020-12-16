<?php
  $user = Auth()->user();
?>


<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="{{URL::to('vendor/assets/images/faces/avatar-2.png')}}" alt="profile">
          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
          <span class="text-secondary text-small">{{ Auth::user()->role_id }}</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>

    @if($user->role_id == 1)
    <li class="nav-item">
      <a class="nav-link" href="/home">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ url('roles')}}">
        <span class="menu-title">Role</span>
        <i class="mdi mdi-pinterest-box menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="pages/charts/chartjs.html">
        <span class="menu-title">Jadwal Mata Pelajaran</span>
        <i class="mdi mdi-table-large menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="pages/charts/chartjs.html">
        <span class="menu-title">Kelola Siswa</span>
        <i class="mdi mdi-account-card-details menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="pages/charts/chartjs.html">
        <span class="menu-title">Kelola Guru</span>
        <i class="mdi mdi-account-card-details menu-icon"></i>
      </a>
    </li>

     <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
            <span class="menu-title">Pengumuman</span>
            <i class="menu-arrow"></i>
            <i class="mdi mdi-voice menu-icon"></i>
          </a>

          <div class="collapse" id="general-pages">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{ url('announcements')}}"> Pengumuman </a></li>
              <li class="nav-item"> <a class="nav-link" href="{{ url('create/announcements')}}"> Buat Pengumuman </a></li>
            </ul>
          </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
          <span class="menu-title">Kelola Tugas</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-book-open-page-variant menu-icon"></i>
        </a>

        <div class="collapse" id="general-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Tugas </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Materi </a></li>
          </ul>
        </div>
      </li>
      
    @elseif($user->role_id == 2)

    <li class="nav-item">
      <a class="nav-link" href="/home">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/charts/chartjs.html">
        <span class="menu-title">Sidebar Buat Guru</span>
        <i class="mdi mdi-table-large menu-icon"></i>
      </a>
    </li>
     <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
            <span class="menu-title">Pengumuman</span>
            <i class="menu-arrow"></i>
            <i class="mdi mdi-voice menu-icon"></i>
          </a>

          <div class="collapse" id="general-pages">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Pengumuman </a></li>
              @if($user->role_id == 2)
              <li class="nav-item"> <a class="nav-link" href="{{ url('announcements')}}"> Buat Pengumuman </a></li>
              @endif
          </div>
      </li>
    @else
    <li class="nav-item">
      <a class="nav-link" href="/home">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/charts/chartjs.html">
        <span class="menu-title">Pengumuman</span>
        <i class="mdi mdi-voice menu-icon"></i>
      </a>
    </li>

    @endif
  </ul>
</nav>