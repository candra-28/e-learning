<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\TeacherTeach;

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
        return view('back-learning.teacher_teaches.index');
    }
}
