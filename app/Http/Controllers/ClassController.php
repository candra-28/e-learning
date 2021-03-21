<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use DataTables;
use App\Models\GradeLevel;
use App\Models\Major;
use App\Models\SchoolYear;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $class = Classes::getListClasses($request->query());
            return Datatables::of($class)
                ->addColumn('class_name', function ($class) {
                    return $class->grl_name . ' ' . $class->mjr_name . ' ' . $class->cls_number;
                })
                ->editColumn("cls_is_active", function ($class) {
                    $class_is_active = $class->cls_is_active;
                    if ($class_is_active == "1") {
                        return '<label class="badge badge-success">aktif</label>';
                    } elseif ($class_is_active == "0") {
                        return '<label class="badge badge-danger">tidak aktif</label>';
                    } else {
                        return "Tidak punya status aktif";
                    }
                })
                ->addIndexColumn()
                ->addColumn('action', function ($class) {
                    $edit = '<a href="' . url('class/edit', $class->cls_id) . '"  type="button" data-toggle="tooltip" data-original-title="Edit" class="btn btn-success btn-sm"><i class="mdi mdi-rename-box"></i></a>';
                    $status = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $class->cls_id . '" data-original-title="Delete" class="btn btn-danger btn-sm status_class"><i class="mdi mdi-information-outline"></i></a>';

                    return $edit . '&nbsp' . $status;
                })
                ->filterColumn('cls_major_id', function ($query, $keyword) {
                    $query->whereRaw("CONCAT(grade_levels.grl_name,'-',majors.mjr_name,'-', classes.cls_number ) like ?", ["%{$keyword}%"]);
                })
                ->rawColumns(['action', 'cls_is_active'])
                ->make(true);
        }
        return view('back-learning.classes.index');
    }

    public function create()
    {
        $grades = GradeLevel::select('grl_id', 'grl_name')->get();
        $majors = Major::where('mjr_is_active', true)->select('mjr_id', 'mjr_name')->get();
        $school_years = SchoolYear::where('scy_is_active', true)->select('scy_id', 'scy_name')->get();
        return view('back-learning.classes.create', compact('grades', 'majors', 'school_years'));
    }

    public function store(Request $request)
    {
        $class_check = Classes::where('cls_grade_level_id', $request->cls_grade_level_id)
            ->where('cls_major_id', $request->cls_major_id)
            ->where('cls_school_year_id', $request->cls_school_year_id)
            ->where('cls_number', $request->cls_number)->count();
        if ($class_check == 0) {
            $class = new Classes;
            $class->cls_grade_level_id = $request->cls_grade_level_id;
            $class->cls_major_id = $request->cls_major_id;
            $class->cls_school_year_id = $request->cls_school_year_id;
            $class->cls_number = $request->cls_number;
            $class->cls_is_active = 1;
            $class->cls_created_by = Auth()->user()->usr_id;
            $class->save();
            return redirect('classes')->with('success', 'Kelas berhasil di tambahkan');
        } else {
            return redirect()->back()->with('error', 'Kelas sudah digunakan');
        }
    }
    public function edit($classID)
    {
        $class = Classes::where('cls_id', $classID)->firstOrFail();
        $grades = GradeLevel::select('grl_id', 'grl_name')->get();
        $majors = Major::where('mjr_is_active', true)->select('mjr_id', 'mjr_name')->get();
        $school_years = SchoolYear::where('scy_is_active', true)->select('scy_id', 'scy_name')->get();
        return view('back-learning.classes.edit', compact('class', 'grades', 'majors', 'school_years'));
    }
    public function update(Request $request, $classID)
    {
        $class_check = Classes::where('cls_grade_level_id', $request->cls_grade_level_id)
            ->where('cls_major_id', $request->cls_major_id)
            ->where('cls_school_year_id', $request->cls_school_year_id)
            ->where('cls_number', $request->cls_number)->count();
        if ($class_check == 0) {
            $class = Classes::where('cls_id', $classID)->firstOrFail();
            $class->cls_grade_level_id = $request->cls_grade_level_id;
            $class->cls_major_id = $request->cls_major_id;
            $class->cls_school_year_id = $request->cls_school_year_id;
            $class->cls_number = $request->cls_number;
            $class->cls_updated_by = Auth()->user()->usr_id;
            $class->update();
            return redirect('classes')->with('success', 'Kelas berhasil di ubah');
        } else {
            return redirect()->back()->with('error', 'Kelas sudah digunakan');
        }
    }

    public function updateStatusClass($classID)
    {
        $class = Classes::findOrFail($classID);
        // dd($class);
        if ($class->cls_is_active == false) {
            $class->cls_is_active = 1;
        } else {
            $class->cls_is_active = 0;
        }
        $class->cls_updated_by = Auth()->user()->usr_id;
        $class->update();
        return response()->json(['code' => 200, 'message' => 'Status kelas berhasil di ubah', 'data' => $class], 200);
    }
}
