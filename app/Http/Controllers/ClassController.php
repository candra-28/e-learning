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
                    return 'Aktif <span class="mdi mdi-check-circle"></span>';
                } elseif ($class_is_active == "0") {
                    return 'Tidak Aktif <span class="mdi mdi-close-circle"></span>';
                } else {
                    return "Tidak punya status aktif";
                }
            })
            ->addIndexColumn()
            ->addColumn('action', function ($class) {
                $edit = '<a href="' . url('class/edit', $class->id) . '"  type="button" data-toggle="tooltip" data-original-title="Edit" class="btn btn-success btn-sm"><i class="mdi mdi-rename-box"></i></a>';
                return $edit;
            })
              ->filterColumn('cls_major_id', function($query, $keyword) {
                $query->whereRaw("CONCAT(grade_levels.grl_name,'-',majors.mjr_name,'-', classes.cls_number ) like ?", ["%{$keyword}%"]);
            })
            ->rawColumns(['action', 'cls_is_active'])
            ->make(true);
        }
        return view('classes.index');
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
}
