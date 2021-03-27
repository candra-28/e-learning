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
                    $edit = '<a href="javascript:void(0)" data-id="' . $subject->sbj_id . '" onclick="editPost(event.target)" class="btn btn-success btn-sm"><i class="mdi mdi-rename-box"></i></a>';
                    $status = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $subject->sbj_id . '" data-original-title="Delete" class="btn btn-danger btn-sm status_subject"><i class="mdi mdi-information-outline"></i></a>';
                    return $edit . '&nbsp' . $status;
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
        $request->validate(
            [
                'sbj_name'       => 'required|unique:subjects,sbj_name',
            ],
            [
                'sbj_name.required' => 'Nama mata pelajaran harus di isi',
                'sbj_name.unique'   => 'Mata pelajaran sudah digunakan'
            ]
        );

        if (!empty($request->sbj_id)) {
            $subject = Subject::updateOrCreate(['sbj_id' => $request->sbj_id], [
                'sbj_name' => $request->sbj_name, 'sbj_is_active'  => $request->sbj_is_active
            ]);
            $message = "Mata pelajaran berhasil di ubah";
        } else {
            $subject = Subject::updateOrCreate(['sbj_id' => $request->sbj_id], [
                'sbj_name' => $request->sbj_name, 'sbj_is_active'  => 1
            ]);
            $message = "Mata pelajaran berhasil di buat";
        }
        return response()->json(['code' => 200, 'message' => $message, 'data' => $subject], 200);
    }

    public function updateStatusSubject($subjectID)
    {
        $subject = Subject::findOrFail($subjectID);
        if ($subject->sbj_is_active == false) {
            $subject->sbj_is_active = 1;
        } else {
            $subject->sbj_is_active = 0;
        }
        $subject->sbj_updated_by = Auth()->user()->usr_id;
        $subject->update();
        return response()->json(['code' => 200, 'message' => 'Status Mata pelajaran berhasil di ubah', 'data' => $subject], 200);
    }
}
