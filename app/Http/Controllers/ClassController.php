<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clas;
use DataTables;

class ClassController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $class = Clas::all();
            return Datatables::of($class)
                ->editColumn("is_active", function ($row) {
                    $class_is_active = $row->is_active;
                    if ($class_is_active == "1") {
                        return 'Aktif <span class="mdi mdi-check-circle"></span>';
                    } elseif ($class_is_active == "0") {
                        return 'Tidak Aktif <span class="mdi mdi-close-circle"></span>';
                    } else {
                        return "Tidak punya status aktif";
                    }
                })
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $edit = '<a href="' . url('class/edit', $row->id) . '"  type="button" data-toggle="tooltip" data-original-title="Edit" class="btn btn-success btn-sm"><i class="mdi mdi-rename-box"></i></a>';
                    return $edit;
                })->rawColumns(['action', 'is_active'])
                ->make(true);
        }
        return view('class.index');
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
