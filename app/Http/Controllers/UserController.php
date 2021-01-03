<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;
use App\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::join('roles', 'users.role_id', '=', 'roles.id')
            ->select('roles.name as role_name', 'roles.*', 'users.id as id_user', 'users.*')
            ->where('users.id', Auth()->user()->id)->first();
        //dd($user);

        return view('users.profile');
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

        $request->validate([
            'current-password'  => 'required'],['current-password.required' => 'Kata sandi lama wajib di isi']);

        // if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        //     // dd("kesini");
        //     return redirect()->back()->with('error', 'Kata sandi lama tidak sesuai');
        // }

        // if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
        //     return redirect()->back();
        // }
        // if (!(strcmp($request->get('new-password'), $request->get('new-password_confirmation'))) == 0) {
        //     return redirect()->back()->with('error', 'Kata sandi');
        // }
        //Change Password
        $input = $request->all();
        $user = User::find(Auth()->user()->id);


        if(!Hash::check($input['current-password'], $user->password)){
            return redirect()->back()->with('error', 'Kata sandi lama tidak sesuai');
        }else{
            $request->validate([
            'new-password' => 'required|min:8|confirmed'],
            [
                'new-password.required'     => 'Kata sandi baru wajib di isi',
                'new-password.min'          => 'Minimal kata sandi 8 karakter',
                'new-password.confirmed'    => 'Kata sandi tidak sama dengan kata sandi konfirmasi',
            ]); 
        }

        $user->password = Hash::make($request->get('new-password'));
        $user->update();
        return redirect()->back()->with('success', 'Kata sandi berhasil di ubah');

    }
}
