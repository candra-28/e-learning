<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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
            ->select('usr_name', 'ulh_log_ip', 'ulh_date','ulh_user_agent')->orderBy('ulh_created_at', 'DESC');
        return $user_log_histories;
    }
    public static function getlistLog($request)
    {
        $user_log = UserLogHistory::where('ulh_user_id',Auth()->user()->usr_id)->select('ulh_log_ip', 'ulh_date','ulh_user_agent')->orderBy('ulh_date', 'DESC');
        return $user_log;
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'ulh_user_id');
    }
}
