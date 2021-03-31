<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use DataTables;
use App\Models\User;
use App\Models\UserHasRole;
use Illuminate\Support\Facades\Mail;
use App\Mail\AddTeacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $teachers = Teacher::getListTeachers($request->query());
            return Datatables::of($teachers)
                ->editColumn("tcr_is_active", function ($teacher) {
                    if ($teacher->tcr_is_active == "1") {
                        return '<label class="badge badge-success">aktif</label>';
                    } elseif ($teacher->tcr_is_active == "0") {
                        return '<label class="badge badge-danger">tidak aktif</label>';
                    } else {
                        return "Tidak punya status aktif";
                    }
                })
                ->addIndexColumn()
                ->addColumn('action', function ($teacher) {
                    $detail = '<a href="' . url('teacher', $teacher->tcr_id) . '"  type="button" data-toggle="tooltip" data-original-title="Detail" class="btn btn-warning btn-sm"><i class="mdi mdi-mdi mdi mdi-eye"></i></a>';
                    $edit = '<a href="' . url('teacher/edit', $teacher->tcr_id) . '"  type="button" data-toggle="tooltip" data-original-title="Edit" class="btn btn-success btn-sm"><i class="mdi mdi-rename-box"></i></a>';
                    $status = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $teacher->tcr_id . '" data-original-title="Delete" class="btn btn-danger btn-sm status_teacher"><i class="mdi mdi-information-outline"></i></a>';
                    return $detail . '&nbsp' . $edit . '&nbsp' . $status;
                })->rawColumns(['action', 'tcr_is_active'])
                ->make(true);
        }
        return view('back-learning.teachers.index');
    }

    public function create()
    {
        return view('back-learning.teachers.create');
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->usr_name = $request->usr_name;
        $user->usr_email = $request->usr_email;
        $rand_string            = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 6);
        $rand_int               = substr(str_shuffle('0123456789'), 0, 4);
        $rand_password          = $rand_string . $rand_int;
        $user->usr_password     = Hash::make($rand_password);
        $user->usr_phone_number = $request->usr_phone_number;
        $user->usr_otp_verified_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->usr_gender = $request->usr_gender;
        $user->usr_place_of_birth = $request->usr_place_of_birth;
        $user->usr_date_of_birth = $request->usr_date_of_birth;
        $user->usr_religion = $request->usr_religion;
        $user->usr_address = $request->usr_address;
        $user->usr_is_active = 1;
        $user->usr_created_by = Auth()->user()->usr_id;
        Mail::to($user['usr_email'])->send(new AddTeacher($user, $rand_password));
        if ($request->hasFile('usr_profile_picture')) {
            $files = $request->file('usr_profile_picture');
            $path = public_path('vendor/be/assets/images/profile_picture');
            $files_name = 'vendor' . '/' . 'be' . '/' . 'assets' . '/' . 'images' . '/' . 'profile_picture' . '/' . date('Ymd') . '_' . $files->getClientOriginalName();
            $files->move($path, $files_name);
            $user->usr_profile_picture = $files_name;
        }

        if ($user->save()) {
            $roles = new UserHasRole;
            $roles->uhs_user_id = $user->usr_id;
            $roles->uhs_role_id = 3;
            $roles->uhs_created_by = Auth()->user()->usr_id;
            $roles->save();

            $teacher = new Teacher;
            $teacher->tcr_user_id = $user->usr_id;
            $teacher->tcr_nip = $request->tcr_nip;
            $teacher->tcr_entry_year = $request->tcr_entry_year;
            $teacher->tcr_is_active = 1;
            $teacher->tcr_created_by = Auth()->user()->usr_id;
            $teacher->save();
        } else {
            return back()->with('error', 'Guru gagal ditambahkan, terjadi kesalahan sistem');
        }
        return redirect('teachers')->with('success', 'Guru berhasil di tambahkan');
    }

    public function edit($teacherID)
    {
        $teacher = Teacher::join('users', 'teachers.user_id', '=', 'users.id')->select('users.*', 'teachers.*')->find($teacherID);
        return view('teachers.edit', ['teacher' => $teacher]);
    }
    public function update(Request $request, $teacherID)
    {
        $request->validate(
            [
                'name'  => 'required',
                'phone_number'  => 'required',
                'nip'   => 'required'
            ],

            $message = [
                'name.required' => 'Nama siswa tidak boleh kosong',
                'phone_number.required' => 'Nomor telepon tidak boleh kosong',
                'nip.required'  => 'Nip tidak boleh kosong'
            ]
        );

        $teacher = Teacher::where('id', $teacherID)->first();
        $teacher->nip = $request->nip;
        $teacher->update();

        $user = User::where('id', $teacher->user_id)->firstOrFail();
        $user->name = $request->name;
        $user->entry_year = $request->entry_year;
        $user->phone_number = $request->phone_number;
        $user->gender = $request->gender;
        $user->place_of_birth = $request->place_of_birth;
        $user->date_of_birth = $request->date_of_birth;
        $user->religion = $request->religion;
        $user->address = $request->address;
        $user->is_active = $request->is_active;
        $user->update();
        return redirect('/teachers');
    }
    public function show($teacherID)
    {
        $teacher = Teacher::findOrFail($teacherID);
        // $teacher->user->usr_is_active;
        // dd($teacher);
        return view('back-learning.teachers.show', compact('teacher'));
    }
    public function updateStatusTeacher($teacherID)
    {
        $teacher = Teacher::findOrFail($teacherID);
        if ($teacher->tcr_is_active == false) {
            $teacher->tcr_is_active = 1;
            $user = $teacher->user;
            $user->usr_is_active = 1;
            $user->usr_updated_by = Auth()->user()->usr_id;
            $user->update();
        } else {
            $teacher->tcr_is_active = 0;
            $user = $teacher->user;
            $user->usr_is_active = 0;
            $user->usr_updated_by = Auth()->user()->usr_id;
            $user->update();
        }
        $teacher->tcr_updated_by = Auth()->user()->usr_id;
        $teacher->update();
        return response()->json(['code' => 200, 'message' => 'Status guru berhasil di ubah', 'data' => $teacher], 200);
    }
}
