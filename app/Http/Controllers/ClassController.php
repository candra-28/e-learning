<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use DataTables;

class ClassController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $class = Classes::getListClasses($request->query());
            return Datatables::of($class)
            ->addColumn('class_name', function($class){
                return $class->grl_name .' '. $class->mjr_name .' '. $class->cls_number;
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
                $status = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$class->cls_id.'" data-original-title="Delete" class="btn btn-danger btn-sm status_class"><i class="mdi mdi-information-outline"></i></a>';

                return $edit . '&nbsp' . $status;
            })
            ->filterColumn('cls_major_id', function($query, $keyword) {
                $query->whereRaw("CONCAT(grade_levels.grl_name,'-',majors.mjr_name,'-', classes.cls_number ) like ?", ["%{$keyword}%"]);
            })
            ->rawColumns(['action', 'cls_is_active'])
            ->make(true);
        }
        return view('back-learning.classes.index');
    }
    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);

        $cek = Clas::where('name', $request->name)->count();
        if ($cek == 0) {
            $class = new Clas;
            $class->name = $request->name;
            $class->is_active = 1;
            $class->save();
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Nama Kelas Sudah digunakan');
        }
    }
    public function edit($classID)
    {
        $class = Clas::find($classID);
        return view('class.edit', ['class' => $class]);
    }
    public function update(Request $request, $classID)
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

        $class = Clas::where('id', $classID)->first();
        $class->name = $request->name;
        $class->is_active = $request->is_active;
        $class->update();
        return redirect('/class');
    }

    public function updateStatusClass($classID)
    {
            $class = Classes::findOrFail($classID)->first();
            if ($class->cls_is_active == false) {
                $class->cls_is_active = 1;
            }else{
                $class->cls_is_active = 0;
            }
            $class->update();
            return response()->json(['code'=>200, 'message'=>'Kelas status berhasil di ubah','data' => $class], 200);
    }
}
