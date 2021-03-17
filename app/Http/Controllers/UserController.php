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

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('roles')->where('usr_id', Auth()->user()->usr_id)->first();

        $role = User::find($user->usr_id)->roles()->first();
        // dd($role->rol_id);

        return view('back-learning.users.profile', compact('user','role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updatePassword(Request $request)
    {
        // dd($request);

        // $input = $request->all();
        $user = User::find(Auth()->user()->usr_id);

        if(!Hash::check($request->current_password, $user->usr_password)){
            return redirect()->back()->with('error', 'Kata sandi lama tidak sesuai');
        }

        $user->usr_password = Hash::make($request->new_password);
        $user->usr_updated_by = Auth()->user()->usr_id;
        $user->update();
        return redirect()->back()->with('success', 'Kata sandi berhasil di ubah');

    }

    public function changeProfilePicture(Request $request){
        $user = User::where('id',Auth()->user()->id)->first();

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
}
