<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Notification;
use Response;
use Illuminate\Support\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\UserNotification;

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
                    $status = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $notification->not_id . '" data-original-title="Delete" class="btn btn-danger btn-sm status_notification"><i class="mdi mdi-information-outline"></i></a>';

                    return $detail . '&nbsp' . '&nbsp' . $status;
                })
                ->rawColumns(['action', 'not_is_active'])
                ->make(true);
        }
        $roles = Role::select('rol_id', 'rol_name')->where('rol_name', '!=', 'Administrator')->get();
        return view('back-learning.notifications.index', compact('roles'));
    }

    public function show($notificationID)
    {
        // $where = array('not_id' => $announcementID);
        // $notification = Notification::where($where)->first();
        $notification = Notification::where('not_id', $notificationID)->with('user')->with('toRole')->first();

        $created_at = Carbon::parse($notification->not_created_at)->translatedFormat('l, d F Y H:i:s');

        if ($notification->not_is_active == 1) {
             $status = '<label class="badge badge-success">Aktif</label>';
        } else {
             $status = '<label class="badge badge-danger">Non Aktif</label>';
        }
        return Response::json(['created_at' => $created_at, 'status' => $status , 'notification' => $notification], 201);
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

        $notification = new Notification;
        $notification->not_title = $request->not_title;
        $notification->not_user_id = Auth()->user()->usr_id;
        $notification->not_to_role_id = $request->not_to_role_id;
        $notification->not_message = $request->not_message;
        $notification->not_created_by = Auth()->user()->usr_id;
        $notification->not_is_active = 1;
        if ($notification->save()) {
            if ($request->not_to_role_id == 4) {
                $all_user_student = User::join('user_has_roles', 'user_has_roles.uhs_user_id', '=', 'users.usr_id')
                    ->join('roles', 'user_has_roles.uhs_role_id', '=', 'roles.rol_id')
                    ->select('usr_id', 'usr_name', 'rol_id', 'rol_name', 'uhs_id', 'uhs_role_id', 'uhs_user_id')->where('rol_name', '=', 'Siswa')
                    ->get();
                foreach ($all_user_student as $user_student) {
                    $user_notification = new UserNotification;
                    $user_notification->usn_notification_id = $notification->not_id;
                    $user_notification->usn_user_id = $user_student->usr_id;
                    $user_notification->usn_is_read = 0;
                    $user_notification->usn_created_by = Auth()->user()->usr_id;
                    $user_notification->save();
                }
            } elseif ($request->not_to_role_id == 3) {
                $all_user_teacher = User::join('user_has_roles', 'user_has_roles.uhs_user_id', '=', 'users.usr_id')
                    ->join('roles', 'user_has_roles.uhs_role_id', '=', 'roles.rol_id')
                    ->select('usr_id', 'usr_name', 'rol_id', 'rol_name', 'uhs_id', 'uhs_role_id', 'uhs_user_id')->where('rol_name', '=', 'Guru')
                    ->get();
                foreach ($all_user_teacher as $user_teacher) {
                    $user_notification = new UserNotification;
                    $user_notification->usn_notification_id = $notification->not_id;
                    $user_notification->usn_user_id = $user_teacher->usr_id;
                    $user_notification->usn_is_read = 0;
                    $user_notification->usn_created_by = Auth()->user()->usr_id;
                    $user_notification->save();
                }
            } else {
                $all_user_admin = User::join('user_has_roles', 'user_has_roles.uhs_user_id', '=', 'users.usr_id')
                    ->join('roles', 'user_has_roles.uhs_role_id', '=', 'roles.rol_id')
                    ->select('usr_id', 'usr_name', 'rol_id', 'rol_name', 'uhs_id', 'uhs_role_id', 'uhs_user_id')->where('rol_name', '=', 'Admin')
                    ->get();
                foreach ($all_user_admin as $user_admin) {
                    $user_notification = new UserNotification;
                    $user_notification->usn_notification_id = $notification->not_id;
                    $user_notification->usn_user_id = $user_admin->usr_id;
                    $user_notification->usn_is_read = 0;
                    $user_notification->usn_created_by = Auth()->user()->usr_id;
                    $user_notification->save();
                }
            }
        } else {
            return back()->with('error', 'Notifikasi gagal di buat');
        }
        return redirect()->back()->with('success', 'Notifikasi berhasil dibuat');
    }
}
