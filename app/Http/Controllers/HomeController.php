<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Classes;
use App\User;
use App\Models\UserHasRole;



class HomeController extends Controller
{
    public function index()
    {
    	$students = Student::count();
    	$teachers = Teacher::count();
    	$classes 	 = Classes::count();
        return view('dashboard',compact('students','teachers','classes'));
    }
}
