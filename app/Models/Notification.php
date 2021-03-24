<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Role;

class Notification extends Model
{
    protected $primaryKey = 'not_id';
    const CREATED_AT = 'not_created_at';
    const UPDATED_AT = 'not_updated_at';
    const DELETED_AT = 'not_deleted_at';
    protected $guarded = [];

    public static function getListNotification($request)
    {
        $notification = Notification::join('users', 'notifications.not_user_id', '=', 'users.usr_id');
        return $notification;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'not_user_id');
    }
    public function toRole()
    {
        return $this->belongsTo(Role::class, 'not_to_role_id');
    }
}
