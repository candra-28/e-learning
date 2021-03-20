<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use DataTables;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $students = Student::getListStudents($request->query());
            return Datatables::of($students)
                ->editColumn("stu_is_active", function ($student) {

                    if ($student->stu_is_active == "1") {
                        return '<label class="badge badge-success">aktif</label>';
                    } elseif ($student->stu_is_active == "0") {
                        return '<label class="badge badge-danger">tidak aktif</label>';
                    } else {
                        return "Tidak punya status aktif";
                    }
                })
                ->addIndexColumn()
                ->addColumn('action', function ($student) {
                    $detail = '<a href="' . url('student', $student->stu_id) . '"  type="button" data-toggle="tooltip" data-original-title="Detail" class="btn btn-warning btn-sm"><i class="mdi mdi-mdi mdi mdi-eye"></i></a>';
                    $edit = '<a href="' . url('student/edit', $student->stu_id) . '"  type="button" data-toggle="tooltip" data-original-title="Edit" class="btn btn-success btn-sm"><i class="mdi mdi-rename-box"></i></a>';
                    $status = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $student->stu_id . '" data-original-title="Delete" class="btn btn-danger btn-sm status_student"><i class="mdi mdi-information-outline"></i></a>';
                    return $detail . '&nbsp' . $edit . '&nbsp' . $status;
                })->rawColumns(['action', 'stu_is_active'])
                ->make(true);
        }
        return view('back-learning.students.index');
    }

    public function create()
    {
        return view('back-learning.students.create');
    }
    public function store(Request $request)
    {
        dd($request);
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

    public function updateStatusStudent($studentID)
    {
        $student = Student::findOrFail($studentID);
        if ($student->stu_is_active == false) {
            $student->stu_is_active = 1;
        } else {
            $student->stu_is_active = 0;
        }
        $student->stu_updated_by = Auth()->user()->usr_id;
        $student->update();
        return response()->json(['code' => 200, 'message' => 'Status siswa berhasil di ubah', 'data' => $student], 200);
    }
}
