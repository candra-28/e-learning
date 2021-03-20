<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $user = User::with('roles')->where('usr_id', Auth()->user()->usr_id)->first();

        $role = User::find($user->usr_id)->roles()->first();
        // dd($role->rol_id);
        $recaptha = Str::random(6);
        // dd($recaptha);
        return view('back-learning.users.profile', compact('user', 'role', 'recaptha'));
    }
    public function updatePassword(Request $request)
    {
        $user = User::find(Auth()->user()->usr_id);

        if (!Hash::check($request->current_password, $user->usr_password)) {
            return redirect()->back()->with('error', 'Kata sandi lama tidak sesuai');
        }

        $user->usr_password = Hash::make($request->new_password);
        $user->usr_updated_by = Auth()->user()->usr_id;
        $user->update();
        return redirect()->back()->with('success', 'Kata sandi berhasil di ubah');
    }

    public function changeProfilePicture(Request $request)
    {
        $user = User::where('id', Auth()->user()->id)->first();

        if ($request->hasFile('profile_picture')) {
            $files = $request->file('profile_picture');
            $path = public_path('profile_picture' . '/' . Auth::user()->name);
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $files_name = date('Ymd') . '_' . $files->getClientOriginalName();
            $files->move($path, $files_name);
            $user->profile_picture = $files_name;
            $user->update();

            return redirect()->back();
        }
    }
    public function updateProfile(Request $request)
    {
        // dd($request);
        $user = User::where('usr_id', Auth()->user()->usr_id)->firstOrFail();

        if ($request->hasFile('usr_profile_picture')) {
            $files = $request->file('usr_profile_picture');
            $path = public_path('vendor/be/assets/images/profile_picture');
            $files_name = 'vendor' . '/' . 'be' . '/' . 'assets' . '/' . 'images' . '/' . 'profile_picture' . '/' . date('Ymd') . '_' . $files->getClientOriginalName();
            $files->move($path, $files_name);
            $user->usr_profile_picture = $files_name;
        }
        $user->usr_name = $request->usr_name;
        $user->usr_phone_number = $request->usr_phone_number;
        $user->usr_gender = $request->usr_gender;
        $user->usr_place_of_birth = $request->usr_place_of_birth;
        $user->usr_date_of_birth = $request->usr_date_of_birth;
        $user->usr_religion = $request->usr_religion;
        $user->usr_address = $request->usr_address;
        $user->usr_updated_by = Auth()->user()->usr_id;

        $user->update();
        return redirect()->back()->with('success', 'Profile berhasil di ubah');
    }
    public function updateEmail(Request $request)
    {
        $request->validate(['new_usr_email' => 'unique:users,usr_email'], ['new_usr_email.unique' => 'Alamat email sudah digunakan']);
        $user = User::where('usr_id', Auth()->user()->usr_id)->firstOrFail();
        // dd($request);
        if ($request->recaptha == $request->usr_verify) {
            $user->usr_email = $request->new_usr_email;
            $user->usr_updated_by = Auth()->user()->usr_id;
            $user->update();
            return redirect()->back()->with('success', 'Alamat email berhasil di ubah');
        }
        return redirect()->back()->with('error', 'Kode verifikasi yang anda masukan salah');
    }
}
