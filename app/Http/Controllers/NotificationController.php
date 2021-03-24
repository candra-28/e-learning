<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Notification;
use Response;
use Illuminate\Support\Carbon;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $notifications = Notification::getListNotification($request->query());
            return Datatables::of($notifications)
                ->editColumn("not_is_active", function ($notification) {
                    if ($notification->not_is_active == "1") {
                        return '<label class="badge badge-success">aktif</label>';
                    } elseif ($notification->not_is_active == "0") {
                        return '<label class="badge badge-danger">tidak aktif</label>';
                    } else {
                        return "Tidak punya status aktif";
                    }
                })
                ->addIndexColumn()
                ->addColumn('action', function ($notification) {
                    $detail = '<a class="btn btn-warning btn-sm" id="show-notification" data-toggle="modal" data-id=' . $notification->not_id . '><i class="mdi mdi-eye"></i></a>';
                    $edit = '<a href="' . url('notification/edit', $notification->not_id) . '"  type="button" data-toggle="tooltip" data-original-title="Edit" class="btn btn-success btn-sm"><i class="mdi mdi-rename-box"></i></a>';
                    $status = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $notification->not_id . '" data-original-title="Delete" class="btn btn-danger btn-sm status_notification"><i class="mdi mdi-information-outline"></i></a>';

                    return $detail . '&nbsp' . $edit . '&nbsp' . $status;
                })
                ->rawColumns(['action', 'not_is_active'])
                ->make(true);
        }
        return view('back-learning.notifications.index');
    }

    public function show($notificationID)
    {
        // $where = array('not_id' => $announcementID);
        // $notification = Notification::where($where)->first();
        $notification = Notification::where('not_id', $notificationID)->with('user')->with('toRole')->first();
        return Response::json($notification);
        //return view('users.show',compact('user'));
    }
    public function updateStatusNotification($notificationID)
    {
        $notification = Notification::findOrFail($notificationID);
        if ($notification->not_is_active == false) {
            $notification->not_is_active = 1;
        } else {
            $notification->not_is_active = 0;
        }
        $notification->not_updated_by = Auth()->user()->usr_id;
        $notification->update();
        return response()->json(['code' => 200, 'message' => 'Status Notifikasi berhasil di ubah', 'data' => $notification], 200);
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'not_title'   => 'required|max:255',
            'not_message' => 'required',
        ]);

        $notification = Notification::updateOrCreate(['acm' => $request->not_id], [
            'not_title' => $request->not_title,
            'not_to_role_id'    => $request->not_to_role_id,
            'not_message' => $request->not_message,
            'not_user_id'   => $request->not_message,
            'not_date'  => Carbon::now(),
        ]);

        return response()->json(['code' => 200, 'message' => 'Notifikasi Berhasil', 'data' => $notification], 200);
    }
}
