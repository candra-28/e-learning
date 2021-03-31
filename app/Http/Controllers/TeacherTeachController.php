<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\TeacherTeach;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Classes;

class TeacherTeachController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $teacher_teaches = TeacherTeach::getListTeacherTeaches($request->query());
            return Datatables::of($teacher_teaches)
                ->addIndexColumn()
                ->addColumn('class_name', function ($class) {
                    return $class->grl_name . ' ' . $class->mjr_name . ' ' . $class->cls_number;
                })
                ->editColumn("tct_is_active", function ($teacher_teach) {
                    $teacher_teach_is_active = $teacher_teach->tct_is_active;
                    if ($teacher_teach_is_active == "1") {
                        return '<label class="badge badge-success">aktif</label>';
                    } elseif ($teacher_teach_is_active == "0") {
                        return '<label class="badge badge-danger">tidak aktif</label>';
                    } else {
                        return "Tidak punya status aktif";
                    }
                })
                ->addColumn('action', function ($teacher_teach) {
                    $detail = '<a href="' . url('teacher', $teacher_teach->tct_id) . '"  type="button" data-toggle="tooltip" data-original-title="Detail" class="btn btn-warning btn-sm"><i class="mdi mdi-mdi mdi mdi-eye"></i></a>';
                    $edit = '<a href="' . url('teacher/edit', $teacher_teach->tct_id) . '"  type="button" data-toggle="tooltip" data-original-title="Edit" class="btn btn-success btn-sm"><i class="mdi mdi-rename-box"></i></a>';
                    $status = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $teacher_teach->tct_id . '" data-original-title="Delete" class="btn btn-danger btn-sm status_teacher_teach"><i class="mdi mdi-information-outline"></i></a>';
                    return $detail . '&nbsp' . $edit . '&nbsp' . $status;
                })
                ->filterColumn('tct_class_id', function ($query, $keyword) {
                    $query->whereRaw("CONCAT(grade_levels.grl_name,'-',majors.mjr_name,'-', classes.cls_number ) like ?", ["%{$keyword}%"]);
                })
                ->rawColumns(['action', 'tct_is_active'])
                ->make(true);
        }
        $teachers = Teacher::where('tcr_is_active', true)->get();
        $subjects = Subject::where('sbj_is_active', true)->get();
        $classes = Classes::where('cls_is_active', true)->get();
        return view('back-learning.teacher_teaches.index',compact('teachers','subjects','classes'));
    }

    public function updateStatusTeacherTeach($teacherTeachID)
    {
        $teacher_teach = TeacherTeach::findOrFail($teacherTeachID);
        if ($teacher_teach->tct_is_active == false) {
            $teacher_teach->tct_is_active = 1;
        } else {
            $teacher_teach->tct_is_active = 0;
        }
        $teacher_teach->tct_updated_by = Auth()->user()->usr_id;
        $teacher_teach->update();
        return response()->json(['code' => 200, 'message' => 'Status guru mengajar berhasil di ubah', 'data' => $teacher_teach], 200);
    }
    public function create()
    {
        return view('back-learning.teacher_teaches.create');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'tct_teacher_id'       => 'required',
                'tct_class_id'         => 'required',
                'tct_subject_id'       => 'required',
                
            ],
            [
                'tct_teacher_id.required' => 'Guru harus di pilih',
                'tct_class_id.required' => 'Kelas harus di pilih',
                'tct_subject_id.required' => 'Mata pelajaran harus di pilih',
            ]
        );

        if (!empty($request->tct_id)) {
            $teacher_teach = TeacherTeach::updateOrCreate(['tct_id' => $request->tct_id], [
                'tct_teacher_id' => $request->tct_teacher_id, 'tct_class_id' => $request->tct_class_id, 'tct_subject_id' => $request->tct_subject_id, 'tct_is_active'  => $request->tct_is_active
            ]);
            $message = "Guru mengajar berhasil di ubah";
        } else {
            $teacher_teach = TeacherTeach::updateOrCreate(['tct_id' => $request->tct_id], [
                'tct_teacher_id' => $request->tct_teacher_id, 'tct_class_id' => $request->tct_class_id, 'tct_subject_id' => $request->tct_subject_id, 'tct_is_active'  => 1
            ]);
            $message = "Guru mengajar berhasil di buat";
        }
        return response()->json(['code' => 200, 'message' => $message, 'data' => $teacher_teach], 200);
    }
}
