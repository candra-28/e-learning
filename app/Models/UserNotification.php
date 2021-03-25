<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
    protected $primaryKey = 'usn_id';
    const CREATED_AT = 'usn_created_at';
    const UPDATED_AT = 'usn_updated_at';
    const DELETED_AT = 'usn_deleted_at';
    protected $guarded = [];

    public static function getNotification()
    {
        $notification = UserNotification::join('users', 'user_notifications.usn_user_id', '=', 'users.usr_id')
            ->join('notifications', 'user_notifications.usn_notification_id', '=', 'notifications.not_id')
            ->where('notifications.not_is_active', 1)
            ->where('usn_user_id', Auth()->user()->usr_id)
            ->get();
        return $notification;
    }
}
