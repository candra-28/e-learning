<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLogHistory extends Model
{
    protected $primaryKey = 'ulh_id';
    const CREATED_AT = 'ulh_created_at';
    const UPDATED_AT = 'ulh_updated_at';
    const DELETED_AT = 'ulh_deleted_at';
    protected $guarded = [];

    public static function getListUserLogHistories($request)
    {
        $user_log_histories = UserLogHistory::join('users', 'user_log_histories.ulh_user_id', '=', 'users.usr_id')
            ->select('usr_name', 'ulh_last_login_ip', 'ulh_date')->orderBy('ulh_created_at', 'DESC');
        return $user_log_histories;
    }
}
