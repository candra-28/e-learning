<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $students = Subject::getListSubjects($request->query());
            return Datatables::of($students)
                ->editColumn("sbj_is_active", function ($subject) {
                    if ($subject->sbj_is_active == "1") {
                        return '<label class="badge badge-success">aktif</label>';
                    } elseif ($subject->sbj_is_active == "0") {
                        return '<label class="badge badge-danger">tidak aktif</label>';
                    } else {
                        return "Tidak punya status aktif";
                    }
                })
                ->editColumn('sbj_created_at', function ($subject) {
                    return getDateFormat($subject->sbj_created_at);
                })
                ->addIndexColumn()
                ->addColumn('action', function ($subject) {
                    $detail = '<a href="#"  type="button" data-toggle="tooltip" data-original-title="Detail" class="btn btn-warning btn-sm"><i class="mdi mdi-mdi mdi-eye"></i></a>';
                    $edit = '<a href="javascript:void(0)" data-id="' . $subject->sbj_id . '" onclick="editPost(event.target)" class="btn btn-success btn-sm"><i class="mdi mdi-rename-box"></i></a>';
                    $status = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $subject->sbj_id . '" data-original-title="Delete" class="btn btn-danger btn-sm status_subject"><i class="mdi mdi-information-outline"></i></a>';
                    return $detail . '&nbsp' . $edit . '&nbsp' . $status;
                })->rawColumns(['action', 'sbj_is_active'])
                ->make(true);
        }
        return view('back-learning.subjects.index');
    }
    public function show($id)
    {
        $subject = Subject::find($id);

        return response()->json($subject);
    }
    public function store(Request $request)
    {
        $request->validate([
            'sbj_name'       => 'required',
        ]);

        $subject = Subject::updateOrCreate(['sbj_id' => $request->sbj_id], [
            'sbj_name' => $request->sbj_name,
        ]);

        return response()->json(['code' => 200, 'message' => 'Mata pelajaran berhasil di buat', 'data' => $subject], 200);
    }

    public function updateStatusStudent($studentID)
    {
        $student = Student::findOrFail($studentID);
        if ($student->stu_is_active == false) {
            $student->stu_is_active = 1;
            $user = $student->user;
            $user->usr_is_active = 1;
            $user->usr_updated_by = Auth()->user()->usr_id;
            $user->update();
        } else {
            $student->stu_is_active = 0;
            $user = $student->user;
            $user->usr_is_active = 0;
            $user->usr_updated_by = Auth()->user()->usr_id;
            $user->update();
        }
        $student->stu_updated_by = Auth()->user()->usr_id;
        $student->update();
        return response()->json(['code' => 200, 'message' => 'Status siswa berhasil di ubah', 'data' => $student], 200);
    }
}
