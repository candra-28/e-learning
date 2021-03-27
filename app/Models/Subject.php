<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $primaryKey = 'sbj_id';
    const CREATED_AT = 'sbj_created_at';
    const UPDATED_AT = 'sbj_updated_at';
    const DELETED_AT = 'sbj_deleted_at';
    protected $guarded = [];

    public static function getListSubjects($request)
    {
        $subjects = Subject::select('sbj_id', 'sbj_name', 'sbj_is_active', 'sbj_is_active', 'sbj_created_at');
        return $subjects;
    }
}
