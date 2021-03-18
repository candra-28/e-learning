<?php

use App\Models\User;

$user = User::join('user_has_roles','user_has_roles.uhs_user_id','=','users.usr_id')
              ->join('roles','user_has_roles.uhs_role_id','=','roles.rol_id')
              ->where('usr_id',Auth()->user()->usr_id)->first();  
?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="{{ url('profiles') }}" class="nav-link">
        <div class="nav-profile-image">
          @if(isset($user->usr_profile_picture))
          <img src="{{ asset('profile_picture/'.$user->name.'/'.$user->profile_picture)}}" alt="null">
          @else
          <img src="{{ asset('profile_picture/avatar-2.png')}}" alt="null">
          @endif
          <span class="login-status online"></span>
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">{{ Auth()->user()->usr_name }}</span>
          <span class="text-secondary text-small">TEST</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>

    @if($user->rol_id == 1)
    <li class="nav-item">
      <a class="nav-link" href="{{ url('dashboard') }}">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ url('classes')}}">
        <span class="menu-title">Kelola Kelas</span>
        <i class="mdi mdi-home-modern menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ url('students')}}">
        <span class="menu-title">Kelola Siswa</span>
        <i class="mdi mdi-account-card-details menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ url('teachers')}}">
        <span class="menu-title">Kelola Guru</span>
        <i class="mdi mdi-account-card-details menu-icon"></i>
      </a>
    </li>


    <li class="nav-item">
      <a class="nav-link" href="#">
        <span class="menu-title">Jadwal Mata Pelajaran</span>
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
          <li class="nav-item"> <a class="nav-link" href="{{ url('announcements')}}"> Pengumuman </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('announcement/create')}}"> Buat Pengumuman </a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#tugas" aria-expanded="false" aria-controls="general-pages">
        <span class="menu-title">Kelola Tugas</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-book-open-page-variant menu-icon"></i>
      </a>

      <div class="collapse" id="tugas">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#"> Tugas </a></li>
          <li class="nav-item"> <a class="nav-link" href="#"> Materi </a></li>
        </ul>
      </div>
    </li>


    <li class="nav-item">
      <a class="nav-link" href="{{ url('log-histories') }}">
        <span class="menu-title">History Login Pengguna</span>
        <i class="mdi mdi mdi-responsive menu-icon"></i>
      </a>
    </li>

    @elseif($user->rol_id == 2)
        <li class="nav-item">
      <a class="nav-link" href="{{ url('dashboard') }}">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ url('classes')}}">
        <span class="menu-title">Kelola Kelas</span>
        <i class="mdi mdi-home-modern menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ url('students')}}">
        <span class="menu-title">Kelola Siswa</span>
        <i class="mdi mdi-account-card-details menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ url('teachers')}}">
        <span class="menu-title">Kelola Guru</span>
        <i class="mdi mdi-account-card-details menu-icon"></i>
      </a>
    </li>


    <li class="nav-item">
      <a class="nav-link" href="#">
        <span class="menu-title">Jadwal Mata Pelajaran</span>
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
          <li class="nav-item"> <a class="nav-link" href="{{ url('announcements')}}"> Pengumuman </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('announcement/create')}}"> Buat Pengumuman </a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#tugas" aria-expanded="false" aria-controls="general-pages">
        <span class="menu-title">Kelola Tugas</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-book-open-page-variant menu-icon"></i>
      </a>

      <div class="collapse" id="tugas">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#"> Tugas </a></li>
          <li class="nav-item"> <a class="nav-link" href="#"> Materi </a></li>
        </ul>
      </div>
    </li>


    <li class="nav-item">
      <a class="nav-link" href="{{ url('log-histories') }}">
        <span class="menu-title">History Login Pengguna</span>
        <i class="mdi mdi mdi-responsive menu-icon"></i>
      </a>
    </li>
    @elseif($user->rol_id == 3)

    <li class="nav-item">
      <a class="nav-link" href="{{ url('dashboard')}}">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
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
          <li class="nav-item"> <a class="nav-link" href="{{ url('announcements') }}"> Pengumuman </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('announcement/create')}}"> Buat Pengumuman </a></li>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ url('students')}}">
        <span class="menu-title">Daftar Siswa</span>
        <i class="mdi mdi-account-card-details menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ url('teachers')}}">
        <span class="menu-title">Daftar Guru</span>
        <i class="mdi mdi-account-card-details menu-icon"></i>
      </a>
    </li>

    @else
    <li class="nav-item">
      <a class="nav-link" href="{{ url('dashboard') }}">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('announcements')}}">
        <span class="menu-title">Pengumuman</span>
        <i class="mdi mdi-voice menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ url('students')}}">
        <span class="menu-title">Daftar Siswa</span>
        <i class="mdi mdi-account-card-details menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ url('teachers')}}">
        <span class="menu-title">Daftar Guru</span>
        <i class="mdi mdi-account-card-details menu-icon"></i>
      </a>
    </li>
    @endif
  </ul>
</nav>