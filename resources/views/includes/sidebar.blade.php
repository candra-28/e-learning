<?php

use App\User;

$user = User::join('roles', 'users.role_id', '=', 'roles.id')->select('roles.name as role_name', 'roles.*', 'users.name as username', 'users.*')->where('users.id', Auth()->user()->id)->first();

?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="{{ url('profiles') }}" class="nav-link">
        <div class="nav-profile-image">
          <img src="{{URL::to('vendor/assets/images/faces/avatar-2.png')}}" alt="profile">
          <span class="login-status online"></span>
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">{{ $user->username }}</span>
          <span class="text-secondary text-small">{{ $user->role_name }}</span>
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
      <a class="nav-link" href="{{ url('class')}}">
        <span class="menu-title">Kelola Kelas</span>
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
      <a class="nav-link" href="#">
        <span class="menu-title">Kelola Siswa</span>
        <i class="mdi mdi-account-card-details menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="#">
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


    @elseif($user->role_id == 2)

    <li class="nav-item">
      <a class="nav-link" href="{{ url('home')}}">
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

    @else
    <li class="nav-item">
      <a class="nav-link" href="{{ url('home') }}">
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
    @endif
  </ul>
</nav>