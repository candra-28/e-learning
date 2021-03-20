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

    public function create()
    {
        return view('back-learning.majors.create');
    }
    public function store(Request $request)
    {
        // dd($request);
        $major = new Major;
        $major->mjr_name = $request->mjr_name;
        $major->mjr_description = $request->mjr_description;
        if ($request->hasFile('mjr_thumnail')) {
            $files = $request->file('mjr_thumnail');
            $path = public_path('vendor/be/assets/images/majors');
            $files_name = 'vendor' . '/' . 'be' . '/' . 'assets' . '/' . 'images' . '/' . 'majors' . '/' . date('Ymd') . '_' . $files->getClientOriginalName();
            $files->move($path, $files_name);
            $major->mjr_thumnail = $files_name;
        }
        $major->mjr_created_by = Auth()->user()->usr_id;
        $major->mjr_is_active = 1;
        $major->save();
        return redirect('majors')->with('success', 'Jurusan berhasil di tambahkan');
    }
    public function edit($majorID)
    {
        $major = Major::where('mjr_id', $majorID)->firstOrFail();
        return view('back-learning.majors.edit', ['major' => $major]);
    }
    public function update(Request $request, $majorID)
    {
        $major = Major::where('mjr_id', $majorID)->firstOrFail();
        $major->mjr_name = $request->mjr_name;
        $major->mjr_description = $request->mjr_description;
        if ($request->hasFile('mjr_thumnail')) {
            $files = $request->file('mjr_thumnail');
            $path = public_path('vendor/be/assets/images/majors');
            $files_name = 'vendor' . '/' . 'be' . '/' . 'assets' . '/' . 'images' . '/' . 'majors' . '/' . date('Ymd') . '_' . $files->getClientOriginalName();
            $files->move($path, $files_name);
            $major->mjr_thumnail = $files_name;
        }
        $major->mjr_updated_by = Auth()->user()->usr_id;
        $major->update();
        return redirect('majors')->with('success', 'Jurusan berhasil di ubah');
    }
    public function show($majorID)
    {
        $major = Major::where('mjr_id', $majorID)->firstOrFail();
        return view('back-learning.majors.show', ['major' => $major]);
    }
    public function updateStatusMajor($majorID)
    {
        $major = Major::findOrFail($majorID);
        if ($major->mjr_is_active == false) {
            $major->mjr_is_active = 1;
        } else {
            $major->mjr_is_active = 0;
        }
        $major->mjr_updated_by = Auth()->user()->usr_id;
        $major->update();
        return response()->json(['code' => 200, 'message' => 'Status jurusan berhasil di ubah', 'data' => $major], 200);
    }
}
