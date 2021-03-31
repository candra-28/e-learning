<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOTPCode;
use App\Mail\ForgotPassword;
use App\Models\User;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\UserLogHistory;
use Carbon\Carbon;
use App\Models\SchoolYear;
use App\Models\UserHasRole;
use App\Models\StudentClass;
use Illuminate\Support\Str;
use DB;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        }
        return view('front-learning.auth.login');
    }

    public function login(Request $request)
    {
        // dd($request);
        $user_login = [
            'usr_email' => $request->input('email'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($user_login, $request->filled('remember'));
        
        if (Auth::check()) {
            $user_login_history = new UserLogHistory();
            $user_login_history->ulh_user_id = Auth::user()->usr_id;
            $user_login_history->ulh_log_ip =  $request->ip();
            $user_login_history->ulh_user_agent =  $request->userAgent();
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
        if (Auth::check()) {
            return redirect('dashboard');
        }
        $classes = Classes::join('grade_levels','classes.cls_grade_level_id','=','grade_levels.grl_id')
        ->join('majors','classes.cls_major_id','=','majors.mjr_id')->where('cls_is_active', true)->select('cls_id','cls_number','grade_levels.grl_name','majors.mjr_name')->get();
        $school_years = schoolYear::where('scy_is_active', true)
        ->get();
        // dd($classes);
        return view('front-learning.auth.register', ['classes' => $classes, 'school_years' => $school_years]);
    }

    public function register(Request $request)
    {
        // dd($request);
        if ($request->role == "siswa") {
            $request->validate(['email' => 'unique:users,usr_email'],['email.unique'  => 'Alamat Email sudah digunakan']);
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
            $user->usr_code_otp = substr(str_shuffle('0123456789'), 0, 6);
            $user->usr_start_otp = Carbon::now()->addMinutes(5)->format('Y-m-d H:i:s');
            $userSaved = $user->save();
            Mail::to($user['usr_email'])->send(new SendOTPCode($user));

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
                $user_login = [
                    'usr_email' => $request->email,
                    'password'  => $request->password,
                ];

                $log_success = Auth::attempt($user_login);
                if ($log_success) {
                    $user_login_history = new UserLogHistory();
                    $user_login_history->ulh_user_id = Auth::user()->usr_id;
                    $user_login_history->ulh_log_ip =  $request->ip();
                    $user_login_history->ulh_user_agent =  $request->userAgent();
                    $user_login_history->ulh_date = Carbon::now();
                    $user_login_history->save();
                }
                return redirect()->route('dashboard');
            }
        } else {
            $request->validate(['teacher_email' => 'unique:users,usr_email'],['teacher_email.unique'  => 'Alamat Email sudah digunakan']);
            $user = new User;
            $user->usr_name = $request->teacher_name;
            $user->usr_email = $request->teacher_email;
            $user->usr_phone_number = $request->phone_number;
            $user->usr_password = Hash::make($request->password);
            $user->usr_gender = $request->gender;
            $user->usr_place_of_birth = $request->place_of_birth;
            $user->usr_date_of_birth   = $request->date_of_birth;
            $user->usr_address  = $request->address;
            $user->usr_is_active = 1;
            $user->usr_code_otp = substr(str_shuffle('0123456789'), 0, 6);
            $user->usr_start_otp = Carbon::now()->addMinutes(5)->format('Y-m-d H:i:s');
            $userSaved = $user->save();
            Mail::to($user['usr_email'])->send(new SendOTPCode($user));
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

                $user_login = [
                    'usr_email' => $request->teacher_email,
                    'password'  => $request->password,
                ];
                $log_success = Auth::attempt($user_login);
                if ($log_success) {
                    $user_login_history = new UserLogHistory();
                    $user_login_history->ulh_user_id = Auth::user()->usr_id;
                    $user_login_history->ulh_last_login_ip =  $request->ip();
                    $user_login_history->ulh_date = Carbon::now();
                    $user_login_history->save();
                }
                return redirect()->route('dashboard');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function waitingVerified(){
        if (Auth::check()) {
            $user_verified_at = is_null(!Auth()->user()->usr_otp_verified_at);
            return view('front-learning.auth.waiting-verified',compact('user_verified_at'));
        }
        return view('front-learning.auth.login');
       
    }
    public function storeWaitingVerified(Request $request){
        $user = Auth()->user();
        if ($user->usr_code_otp == $request->usr_code_otp) {
            if ($user->usr_start_otp > Carbon::now()->format('Y-m-d H:i:s')) {
                $user->usr_otp_verified_at = Carbon::now();
                $user->update();
                return redirect()->back()->with(['success' => 'Akun anda berhasil di verifikasi']);
            }else{
                return redirect()->back()->with(['error' => 'Kode OTP sudah kadaluarsa, Silahkan kirim ulang']);
            }
        }
        return redirect()->back()->with(['error' => 'Kode yang anda masukan salah']);
    }
    public function resendCodeOtp(Request $request)
    {
        $user = Auth()->user();
        // dd($user);
        $user->usr_code_otp = substr(str_shuffle('0123456789'), 0, 6);
        $user->usr_start_otp = Carbon::now()->addMinutes(5)->format('Y-m-d H:i:s');
        $user->usr_updated_by = Auth()->user()->usr_id;
        $user->update();
        Mail::to($user['usr_email'])->send(new SendOTPCode($user));
        return redirect()->back()->with(['success' => 'Kode OTP berhasil di kirim ulang']);
    }
    public function forgotPassword()
    {
        if (Auth::check()) {
            return redirect()->back();
        }
        return view('front-learning.auth.forgot-password');
    }
    public function storeForgotPassword(Request $request)
    {
        $users = User::where('usr_email', $request->usr_email)->first();
        if ($users == false) {
            return redirect()->back()->with(['error' => 'Email tidak terdaftar']);
        } elseif ($users->usr_otp_verified_at == false) {
            return redirect()->back()->with(['error' => 'Akun belum di verifikasi']);
        }

        DB::table('password_resets')->insert([
            'pwr_email' => $request->usr_email,
            'pwr_token' => str_replace('/', '', Hash::make(Str::random(12))),
            'pwr_created_at' => Carbon::now(),
        ]);

        $tokenData = DB::table('password_resets')->where('pwr_email', $request->usr_email)->first();

        Mail::to($tokenData->pwr_email)->send(new ForgotPassword($tokenData->pwr_token, $users));
        return redirect()->back()->with(['success' => 'Alamat link Reset Password berhasil di Kirim ke Email']);
    }
    public function verifyTokenForgotPassword($token, $userID)
    {
        $resetPassword = DB::table('password_resets')->where('pwr_token', $token)->first();
        if (!$resetPassword) {
            return redirect('forgot-password')->with(['errors', 'Maaf alamat link sudah digunakan']);
        }
        return view('front-learning.auth.reset-password', compact('resetPassword'));
    }
    public function storeResetPassword(Request $request)
    {
        $user = User::where('usr_email', $request->pwr_email)->first();
        $user->usr_password = Hash::make($request->usr_password);
        $user->update();

        DB::table('password_resets')->where(['pwr_email' => $request->pwr_email])->delete();

        return redirect('/login')->with(['success' => 'Password Anda Berhasil di setel ulang']);
    }
}
