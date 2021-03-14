<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Validator;
use App\User;
use App\Models\Classes;
use App\Student;
use App\Teacher;
use App\Models\UserLogHistory;
use Carbon\Carbon;

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
        $classes = Classes::where('cls_is_active', true)->get();
        return view('auth.register', ['classes' => $classes]);
    }

    public function register(Request $request)
    {
        dd($request);
        if ($request->role == "siswa") {

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            // $user->email_verified_at = \Carbon\Carbon::now();
            $user->entry_year = $request->entry_year;
            $user->gender = $request->gender;
            $user->place_of_birth = $request->place_of_birth;
            $user->date_of_birth   = $request->date_of_birth;
            $user->religion = $request->religion;
            $user->address  = $request->address;
            $user->is_active = 1;
            $user->role_id = 3;
            $userSaved = $user->save();

            if ($userSaved) {
                $student = new Student;
                $student->user_id = $user->id;
                $student->class_id = $request->class_id;
                $student->nis = $request->nis;
                $student->save();
                return redirect()->route('login')->with(['success' => 'Register berhasil! Silahkan login']);
            }
        } else {

            $rules = [
                'teacher_name'          => 'required|min:3|max:35',
                'teacher_email'         => 'required|email|unique:users,email',
                'password'              => 'required|confirmed',
                'entry_year'            => 'required',
            ];

            $messages = [
                'teacher_name.required'         => 'Nama Lengkap wajib diisi',
                'teacher_name.min'              => 'Nama lengkap minimal 3 karakter',
                'teacher_name.max'              => 'Nama lengkap maksimal 35 karakter',
                'teacher_email.required'        => 'Email wajib diisi',
                'teacher_email.email'           => 'Email tidak valid',
                'teacher_email.unique'          => 'Email sudah terdaftar',
                'password.required'     => 'Password wajib diisi',
                'password.confirmed'    => 'Password tidak sama dengan konfirmasi password',
                'entry_year.required'   => 'Tahun masuk wajib di pilih',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }


            $user = new User;
            $user->name = ucwords(strtolower($request->teacher_name));
            $user->email = strtolower($request->teacher_email);
            $user->password = Hash::make($request->password);
            $user->email_verified_at = \Carbon\Carbon::now();
            $user->entry_year = $request->entry_year;
            $user->gender = $request->gender;
            $user->place_of_birth = $request->place_of_birth;
            $user->date_of_birth   = $request->date_of_birth;
            $user->address  = $request->address;
            $user->is_active = 1;
            $user->role_id = 2;
            $userSaved = $user->save();

            if ($userSaved) {
                $teacher = new Teacher;
                $teacher->user_id = $user->id;
                $teacher->nip = $request->nip;
                $teacher->save();
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
