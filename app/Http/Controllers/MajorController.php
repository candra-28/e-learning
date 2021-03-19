<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use DataTables;

class MajorController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $majors = Major::getListMajors($request->query());
            return Datatables::of($majors)
                ->editColumn("mjr_is_active", function ($major) {
                    if ($major->mjr_is_active == "1") {
                        return '<label class="badge badge-success">aktif</label>';
                    } elseif ($major->mjr_is_active == "0") {
                        return '<label class="badge badge-danger">tidak aktif</label>';
                    } else {
                        return "Tidak punya status aktif";
                    }
                })
                ->addIndexColumn()
                ->addColumn('action', function ($major) {
                    $detail = '<a href="' . url('major', $major->mjr_id) . '"  type="button" data-toggle="tooltip" data-original-title="Detail" class="btn btn-warning btn-sm"><i class="mdi mdi-mdi mdi mdi-eye"></i></a>';
                    $edit = '<a href="' . url('major/edit', $major->mjr_id) . '"  type="button" data-toggle="tooltip" data-original-title="Edit" class="btn btn-success btn-sm"><i class="mdi mdi-rename-box"></i></a>';
                    $status = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $major->mjr_id . '" data-original-title="Delete" class="btn btn-danger btn-sm status_major"><i class="mdi mdi-information-outline"></i></a>';
                    return $detail . '&nbsp' . $edit . '&nbsp' . $status;
                })
                ->rawColumns(['action', 'mjr_is_active'])
                ->make(true);
        }
        return view('back-learning.majors.index');
    }
}
