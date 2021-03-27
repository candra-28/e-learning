<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\GradeLevel;
use App\Models\Major;
use App\Models\SchoolYear;
use App\Models\Teacher;

class Classes extends Model
{
    protected $primaryKey = 'cls_id';
    protected $table = 'classes';
    const CREATED_AT = 'cls_created_at';
    const UPDATED_AT = 'cls_updated_at';
    const DELETED_AT = 'cls_deleted_at';
    protected $guarded = [];

    public static function getListClasses($request)
    {
        $classes = Classes::join('grade_levels', 'classes.cls_grade_level_id', '=', 'grade_levels.grl_id')
            ->join('majors', 'classes.cls_major_id', '=', 'majors.mjr_id')
            ->join('school_years', 'classes.cls_school_year_id', '=', 'school_years.scy_id')
            ->join('teachers', 'classes.cls_homeroom_teacher_id', '=', 'teachers.tcr_id')
            ->join('users', 'tcr_user_id', '=', 'users.usr_id')->select('classes.cls_id', 'classes.cls_number', 'classes.cls_is_active', 'grl_name', 'mjr_name', 'scy_name', 'usr_name');
        return $classes;
    }

    public function grade_level()
    {
        return $this->belongsTo(GradeLevel::class, 'cls_grade_level_id');
    }
    public function major()
    {
        return $this->belongsTo(Major::class, 'cls_major_id');
    }
    public function school_year()
    {
        return $this->belongsTo(SchoolYear::class, 'cls_school_year_id');
    }
    // public function homeroom_teacher()
    // {
    //     return $this->belongsTo(Teacher::class, 'cls_homeroom_teacher_id');
    // }
    // public function get_name_homeroom_teacher()
    // {
    //     return $this->homeroom_teacher->belongsTo(User::class, 'tcr_user_id', 'usr_id');
    // }
}
