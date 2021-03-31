<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Classes;
use App\Models\User;
use App\Models\UserHasRole;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentClass;
use App\Models\UserLogHistory;

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
        $classes  = Classes::count();
        $user_log_histories = UserLogHistory::take(10)->orderBy('ulh_date','DESC')->get();
        $roles = User::find(Auth()->user()->usr_id)->roles;
        foreach ($roles as $role);
        if ($role->rol_id == 4) {
            $student_class = StudentClass::join('students', 'student_classes.stc_student_id', '=', 'students.stu_id')
                ->where('students.stu_user_id', Auth()->user()->usr_id)->first();
            return view('back-learning.dashboard', compact('classes', 'teachers', 'students', 'student_class', 'role','user_log_histories'));
            // if (is_null($student_class)) {
            //     return view('back-learning.dashboard', compact('classes', 'teachers', 'students'));
            // }
        }

        return view('back-learning.dashboard', compact('classes', 'teachers', 'students', 'role','user_log_histories'));
    }
}
