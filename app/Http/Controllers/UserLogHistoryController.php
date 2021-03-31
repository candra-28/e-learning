<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLogHistory;
use DataTables;

class UserLogHistoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $user_log_histories = UserLogHistory::getListUserLogHistories($request->query());
            return Datatables::of($user_log_histories)
                ->editColumn("ulh_date", function ($user_log) {
                    return getDateFormatLDFYHIS($user_log->ulh_date);
                })
                ->addIndexColumn()
                ->rawColumns(['ulh_date'])
                ->make(true);
        }
        return view('back-learning.user_log_histories.index');
    }

    public function reset(Request $request)
    {
        if ($request->ajax()) {
            if (UserLogHistory::truncate()) {
                return response()->json(['code' => 200, 'message' => 'Semua data log berhasil tereset'], 200);
            } else {
                return response()->json(['code' => 400, 'message' => 'Terjadi kesalahan, Data gagal direset'], 400);
            }
        }
    }

    public function listLog(Request $request)
    {
        if ($request->ajax()) {
            $user_log_histories = UserLogHistory::getlistLog($request->query());
            return Datatables::of($user_log_histories)
                ->editColumn("ulh_date", function ($user_log) {
                    return getDateFormatLDFYHIS($user_log->ulh_date);
                })
                ->addIndexColumn()
                ->rawColumns(['ulh_date'])
                ->make(true);
        }
        return view('back-learning.user_log_histories.user-log');
    }

}
