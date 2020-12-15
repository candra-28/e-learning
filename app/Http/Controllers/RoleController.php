<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use DataTables;

class RoleController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $roles = Role::all();
            return Datatables::of($roles)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn1 = '<a href="' . url('role/edit', $row->id) . '"  type="button" data-toggle="tooltip" data-original-title="Edit" class="btn btn-success btn-sm"><i class="mdi mdi-rename-box"></i></a>';

                    return $btn1;
                })->rawColumns(['action'])
                ->make(true);
        }
        return view('roles.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        $role = new Role;
        $role->name = $request->name;
        $role->save();
        return redirect('/roles');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
