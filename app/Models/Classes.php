<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\GradeLevel;
use App\Models\Major;
use App\Models\SchoolYear;

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
            ->join('school_years', 'classes.cls_school_year_id', '=', 'school_years.scy_id');
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
}
