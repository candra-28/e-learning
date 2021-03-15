<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Validator;
use App\User;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\UserLogHistory;
use Carbon\Carbon;
use App\Models\SchoolYear;
use App\Models\UserHasRole;
use App\Models\StudentClass;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user_login = [
            'usr_email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($user_login);

        if (Auth::check()) {
            $user_login_history = new UserLogHistory();
            $user_login_history->ulh_user_id = Auth::user()->usr_id;
            $user_login_history->ulh_last_login_ip =  $request->ip();
            $user_login_history->ulh_date = Carbon::now();
            if ($user_login_history->save()) {
                return redirect()->route('dashboard');
            }else{
                Auth::logout();
                return redirect()->back()->withErrors(['Terjadi kegagalan sistem']);
            }
        } else {
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
    }

    public function showFormRegister()
    {
        $classes = Classes::join('grade_levels','classes.cls_grade_level_id','=','grade_levels.grl_id')
        ->join('majors','classes.cls_major_id','=','majors.mjr_id')->where('cls_is_active', true)->select('cls_id','cls_number','grade_levels.grl_name','majors.mjr_name')->get();
        $school_years = schoolYear::where('scy_is_active', true)
        ->get();
        // dd($classes);
        return view('auth.register', ['classes' => $classes, 'school_years' => $school_years]);
    }

    public function register(Request $request)
    {
        // dd($request);
        // dd(Auth()->user()->usr_id);
        if ($request->role == "siswa") {

            $user = new User;
            $user->usr_name = $request->name;
            $user->usr_email = $request->email;
            $user->usr_phone_number = $request->phone_number;
            $user->usr_password = Hash::make($request->password);
            $user->usr_gender = $request->gender;
            $user->usr_place_of_birth = $request->place_of_birth;
            $user->usr_date_of_birth   = $request->date_of_birth;
            $user->usr_religion = $request->religion;
            $user->usr_address  = $request->address;
            $user->usr_is_active = 1;
            $userSaved = $user->save();

            if ($userSaved) {
                $student = new Student;
                $student->stu_user_id = $user->usr_id;
                // $student->stu_class_id = $request->class_id;
                $student->stu_nis = $request->nis;
                $student->stu_school_year_id = $request->school_year_id;
                $student->stu_is_active = 1;
                $student->stu_created_by = $user->usr_id;
                $student->save();

                $role = new UserHasRole;
                $role->uhs_user_id = $user->usr_id;
                $role->uhs_role_id = $request->user_role;
                $role->uhs_created_by = $user->usr_id;
                $role->save();
                return redirect()->route('login')->with(['success' => 'Register berhasil! Silahkan login']);
            }
        } else {

            $user = new User;
            $user->usr_name = $request->teacher_name;
            $user->usr_email = $request->teacher_email;
            $user->usr_phone_number = $request->phone_number;
            $user->usr_password = Hash::make($request->password);
            // $user->email_verified_at = \Carbon\Carbon::now();
            // $user->entry_year = $request->entry_year;
            $user->usr_gender = $request->gender;
            $user->usr_place_of_birth = $request->place_of_birth;
            $user->usr_date_of_birth   = $request->date_of_birth;
            $user->usr_address  = $request->address;
            $user->usr_is_active = 1;
            // $user->role_id = 2;
            $userSaved = $user->save();

            if ($userSaved) {
                $teacher = new Teacher;
                $teacher->tcr_user_id = $user->usr_id;
                $teacher->tcr_nip = $request->nip;
                $teacher->tcr_entry_year = $request->entry_year;
                $teacher->tcr_is_active = 1;
                $teacher->save();
                
                $role = new UserHasRole;
                $role->uhs_user_id = $user->usr_id;
                $role->uhs_role_id = $request->user_role;
                $role->uhs_created_by = $user->usr_id;
                $role->save();
                return redirect()->route('login')->with(['success' => 'Register berhasil! Silahkan login']);
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
