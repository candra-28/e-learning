<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use DataTables;

class StudentController extends Controller
{
    public function index(Request $request)
    {
    	if ($request->ajax()) {
            $students = Student::join('users', 'students.user_id', '=', 'users.id')
            ->join('class','students.class_id', '=', 'class.id')->select(
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
                    $edit = '<a href="' . url('student/edit', $row->id_student) . '"  type="button" data-toggle="tooltip" data-original-title="EDIT" class="btn btn-success btn-sm"><i class="mdi mdi-rename-box"></i></a>';
                    return $edit . '&nbsp' . $detail;
                })->rawColumns(['action', 'is_active'])
                ->make(true);
        }
         return view('students.index');
    }
     public function edit($studentID)
    {
        $students = Student::join('users', 'students.user_id', '=', 'users.id')
            ->find($studentID);
            //dd($studentID);
        return view('students.edit', ['student' => $students]);
    }
    public function update(Request $request, $studentID)
    {
        $request->validate(
            [
                'name'  => 'required',
                'is_active' => 'required'
            ],

            $message = [
                'name.required' => 'Nama Kelas Tidak Boleh Kosong',
                'is_active.required'     => 'Pilih salah satu sebelum di simpan'
            ]
        );

        $students = Student::where('id', $studentID)->first();
        $students->name = $request->name;
        $students->entry_year = $request->entry_year;
        $students->is_active = $request->is_active;
        $students->update();
        return redirect('/students');
    }
}
