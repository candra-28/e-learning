<?php

use App\Models\User;
use App\Models\StudentClass;

$student_class = StudentClass::join('students', 'student_classes.stc_student_id', '=', 'students.stu_id')
  ->where('students.stu_user_id', Auth()->user()->usr_id)->first();
// dd($student_class);

$role = User::getRoles();

?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="{{ url('profiles') }}" class="nav-link">
        <div class="nav-profile-image">
          @if(isset(Auth()->user()->usr_profile_picture))
          <img src="{{ asset(Auth()->user()->usr_profile_picture)}}" alt="null">
          @else
          <img src="{{ asset('vendor/be/assets/images/profile_picture/avatar-2.png')}}" alt="null">
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

    @if($role->rol_name == "Administrator")
    <li class="nav-item">
      <a class="nav-link" href="{{ url('dashboard') }}">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ url('classes')}}">
        <span class="menu-title">Kelas</span>
        <i class="mdi mdi-home-modern menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ url('majors')}}">
        <span class="menu-title">Jurusan</span>
        <i class="mdi mdi-school menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ url('students')}}">
        <span class="menu-title">Siswa</span>
        <i class="mdi mdi-account-card-details menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ url('teachers')}}">
        <span class="menu-title">Guru</span>
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
        <span class="menu-title">Tugas</span>
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

    <li class="nav-item">
      <a class="nav-link" href="{{ url('notifications') }}">
        <span class="menu-title">Notifikasi</span>
        <i class="mdi mdi-bell-outline menu-icon"></i>
      </a>
    </li>

    @elseif($role->rol_name == "Admin")
    <li class="nav-item">
      <a class="nav-link" href="{{ url('dashboard') }}">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ url('classes')}}">
        <span class="menu-title">Kelas</span>
        <i class="mdi mdi-home-modern menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ url('students')}}">
        <span class="menu-title">Siswa</span>
        <i class="mdi mdi-account-card-details menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ url('teachers')}}">
        <span class="menu-title">Guru</span>
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
        <span class="menu-title">Tugas</span>
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

    <li class="nav-item">
      <a class="nav-link" href="{{ url('notifications') }}">
        <span class="menu-title">Notifikasi</span>
        <i class="mdi mdi-bell-outline menu-icon"></i>
      </a>
    </li>

    @elseif($role->rol_name == "Guru")

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
    @if($student_class == null)
    @else
    <li class="nav-item">
      <a class="nav-link" href="{{ url('class')}}">
        <span class="menu-title">Kelas Ku</span>
        <i class="mdi mdi-school menu-icon"></i>
      </a>
    </li>
    @endif
  </ul>
</nav>