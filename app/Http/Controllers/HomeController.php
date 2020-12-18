<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Teacher;
use App\Clas;

class HomeController extends Controller
{
    public function index()
    {
    	$student = Student::count();
    	$teacher = Teacher::count();
    	$class 	 = Clas::count();
        return view('index',['student'=> $student,'teacher'=> $teacher,'class'=> $class]);
    }
}
