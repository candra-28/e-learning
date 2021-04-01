<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherTeach extends Model
{
    protected $primaryKey = 'tct_id';
    protected $table = 'teacher_teaches';
    const CREATED_AT = 'tct_created_at';
    const UPDATED_AT = 'tct_updated_at';
    const DELETED_AT = 'tct_deleted_at';
    protected $guarded = [];

    public static function getListTeacherTeaches($request)
    {
        $teacher_teaches = TeacherTeach::join('teachers', 'teacher_teaches.tct_teacher_id', '=', 'teachers.tcr_id')
            ->join('users', 'teachers.tcr_user_id', '=', 'users.usr_id')
            ->join('classes', 'teacher_teaches.tct_class_id', '=', 'classes.cls_id')
            ->join('grade_levels', 'classes.cls_grade_level_id', '=', 'grade_levels.grl_id')
            ->join('majors', 'classes.cls_major_id', '=', 'majors.mjr_id')
            ->join('school_years', 'classes.cls_school_year_id', '=', 'school_years.scy_id')
            ->join('subjects', 'teacher_teaches.tct_subject_id', '=', 'subjects.sbj_id')
            ->groupBy('users.usr_name', 'subjects.sbj_name');
            return $teacher_teaches;
    }

}
