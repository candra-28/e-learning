<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use DataTables;
use App\User;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $teachers = Teacher::join('users', 'teachers.user_id', '=', 'users.id')
                ->select(
                    'users.*',
                    'teachers.id as id_teacher',
                    'users.name',
                    'users.entry_year',
                    'users.is_active as user_is_active',
                    'teachers.*',
                )->get();
            return Datatables::of($teachers)
                ->editColumn("is_active", function ($row) {
                    $user_is_active = $row->user_is_active;
                    if ($user_is_active == "1") {
                        return 'Aktif <span class="mdi mdi-check-circle"></span>';
                    } elseif ($class_is_active == "0") {
                        return 'Tidak Aktif <span class="mdi mdi-close-circle"></span>';
                    } else {
                        return "Tidak punya status aktif";
                    }
                })
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $detail = '<a href="' . url('teacher', $row->id_teacher) . '"  type="button" data-toggle="tooltip" data-original-title="DETAIL" class="btn btn-primary btn-sm"><i class="mdi mdi-eye"></i></a>';
                    if (Auth()->user()->role_id == 1) {
                        $edit = '<a href="' . url('teacher/edit', $row->id_teacher) . '"  type="button" data-toggle="tooltip" data-original-title="EDIT" class="btn btn-success btn-sm"><i class="mdi mdi-rename-box"></i></a>';
                    } else {
                        return $detail;
                    }
                    return $edit . '&nbsp' . $detail;
                })->rawColumns(['action', 'is_active'])
                ->make(true);
        }
        return view('teachers.index');
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
    { {
            $teacher = Teacher::join('users', 'teachers.user_id', '=', 'users.id')->where('teachers.id', $teacherID)->first();
            return view('teachers.show', ['teacher' => $teacher]);
        }
    }
}
