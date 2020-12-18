<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use DataTables;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $students = Student::join('users', 'students.user_id', '=', 'users.id')
                ->join('class', 'students.class_id', '=', 'class.id')->select(
                    'users.*',
                    'students.*',
                    'class.*',
                    'students.id as id_student',
                    'students.nis',
                    'users.name',
                    'class.name as class_name',
                    'users.entry_year',
                    'users.is_active as user_is_active'
                )->get();
            return Datatables::of($students)
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
                    $detail = '<a href="' . url('student', $row->id_student) . '"  type="button" data-toggle="tooltip" data-original-title="DETAIL" class="btn btn-primary btn-sm"><i class="mdi mdi-eye"></i></a>';
                    if (Auth()->user()->role_id == 1)
                        $edit = '<a href="' . url('student/edit', $row->id_student) . '"  type="button" data-toggle="tooltip" data-original-title="EDIT" class="btn btn-success btn-sm"><i class="mdi mdi-rename-box"></i></a>';
                    else {
                        return $detail;
                    }
                    return $edit . '&nbsp' . $detail;
                })->rawColumns(['action', 'is_active'])
                ->make(true);
        }
        return view('students.index');
    }
    public function edit($studentID)
    {
        $student = Student::join('users', 'students.user_id', '=', 'users.id')->select(
            'users.*',
            'students.*'
        )->find($studentID);
        // dd($studentID, $student->id);
        return view('students.edit', ['student' => $student]);
    }
    public function update(Request $request, $studentID)
    {
        $request->validate(
            [
                'name'  => 'required',
                'phone_number'  => 'required',
                'nis'   => 'required'
            ],

            $message = [
                'name.required' => 'Nama siswa tidak boleh kosong',
                'phone_number.required' => 'Nomor telepon tidak boleh kosong',
                'nis.required'  => 'Nis tidak boleh kosong'
            ]
        );

        $student = Student::where('id', $studentID)->first();
        $student->nis = $request->nis;
        $student->update();

        $user = User::where('id', $student->user_id)->firstOrFail();
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
        return redirect('/students');
    }
    public function show($studentID)
    {
        $student = Student::join('users', 'students.user_id', '=', 'users.id')->join('class', 'students.class_id', '=', 'class.id')
            ->select('class.name as class_name', 'users.*', 'students.*')->where('students.id', $studentID)->first();
        return view('students.show', ['student' => $student]);
    }
}
