<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Classes;
use App\User;
use App\Models\UserHasRole;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
    	if (Auth()->user()->usr_is_active == false) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Akun anda telah di nonaktifkan');
        }
    	$students = Student::count();
    	$teachers = Teacher::count();
    	$classes 	 = Classes::count();
        return view('back-learning.dashboard',compact('students','teachers','classes'));
    }
}
