<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Teacher extends Model
{
    protected $primaryKey = 'tcr_id';
    const CREATED_AT = 'tcr_created_at';
    const UPDATED_AT = 'tcr_updated_at';
    const DELETED_AT = 'tcr_deleted_at';
    protected $guarded = [];

    public static function getListTeachers($request)
    {
        $teachers = Teacher::join('users', 'teachers.tcr_user_id', '=', 'users.usr_id');
        return $teachers;
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'tcr_user_id');
    }
}
