<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentClass;
use App\Models\User;
use App\Models\Classes;

class StudentClassController extends Controller
{
    public function selectClasses()
    {
        $roles = User::find(Auth()->user()->usr_id)->roles;
        foreach ($roles as $role);
        if ($role->rol_id == 4) {
            $student_class = StudentClass::join('students', 'student_classes.stc_student_id', '=', 'students.stu_id')
                ->where('students.stu_user_id', Auth()->user()->usr_id)->first();
            if (is_null($student_class)) {
                $classes = Classes::join('students', 'students.stu_school_year_id', '=', 'classes.cls_school_year_id')->where('cls_is_active', 1)->orderBy('cls_school_year_id', 'ASC')->get();
                return view('back-learning.classes.select-classes', compact('classes'));
            }
            abort(404);
        }
        abort(404);
    }

    public function selectClassesStore($classID)
    {
        $user = User::join('students', 'users.usr_id', '=', 'students.stu_user_id')->where('usr_id', Auth()->user()->usr_id)->first();
        $student_class = new StudentClass;
        $student_class->stc_student_id = $user->stu_id;
        $student_class->stc_class_id = $classID;
        $student_class->stc_created_by = Auth()->user()->usr_id;
        $student_class->stc_is_active = 1;
        $student_class->save();
        return response()->json(['code' => 200, 'message' => 'Siswa berhasil mendapatkan kelas', 'data' => $student_class], 200);
    }
}
