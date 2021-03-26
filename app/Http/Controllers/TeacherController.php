<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use DataTables;
use App\User;

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
        $teacher = Teacher::join('users', 'teachers.user_id', '=', 'users.id')->where('teachers.id', $teacherID)->first();
        return view('teachers.show', ['teacher' => $teacher]);
    }
    public function updateStatusTeacher($teacherID)
    {
        $teacher = Teacher::findOrFail($teacherID);
        if ($teacher->tcr_is_active == false) {
            $teacher->tcr_is_active = 1;
        } else {
            $teacher->tcr_is_active = 0;
        }
        $teacher->tcr_updated_by = Auth()->user()->usr_id;
        $teacher->update();
        return response()->json(['code' => 200, 'message' => 'Status guru berhasil di ubah', 'data' => $teacher], 200);
    }
}
