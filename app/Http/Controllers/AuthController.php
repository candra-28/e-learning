<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Validator;
use App\User;
use App\Clas;
use App\Student;
use App\Teacher;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($data);

        if (Auth::check()) {
            return redirect()->route('home');
        } else {
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
    }

    public function showFormRegister()
    {
        $class = Clas::where('is_active', true)->get();
        return view('auth.register', ['class' => $class]);
    }

    public function register(Request $request)
    {
        // dd($request);
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed',
            'entry_year'            => 'required',
            'gender'                => 'required'
        ];

        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password',
            'entry_year.required'   => 'Tahun masuk wajib di pilih',
            'gender.required'       => 'Pilih salah satu jenis kelammin'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        if ($request->role == "siswa") {
            $user = new User;
            $user->name = ucwords(strtolower($request->name));
            $user->email = strtolower($request->email);
            $user->password = Hash::make($request->password);
            $user->email_verified_at = \Carbon\Carbon::now();
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
            $user = new User;
            $user->name = ucwords(strtolower($request->name));
            $user->email = strtolower($request->email);
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
        return redirect()->route('login');
    }
}
