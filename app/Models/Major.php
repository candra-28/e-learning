<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Classes;
use App\Models\User;

class Major extends Model
{
    protected $primaryKey = 'mjr_id';
    const CREATED_AT = 'mjr_created_at';
    const UPDATED_AT = 'mjr_updated_at';
    const DELETED_AT = 'mjr_deleted_at';
    protected $guarded = [];

    public function class()
    {
        $this->belongsTo(Classes::class, 'cls_major_id', 'mjr_id');
    }
    public static function getListMajors($request)
    {
        $majors = Major::select('mjr_id', 'mjr_name', 'mjr_is_active');
        return $majors;
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'mjr_created_by');
    }
}
