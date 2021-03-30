<?php

use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\StudentClass;
use App\Models\Classes;

function getDateFormat($datetime)
{
    if (isset($datetime)) {
        return Carbon::parse($datetime)->translatedFormat('l, d F Y');
    }
}

function getDateBirthday($datetime)
{
    if (isset($datetime)) {
        return Carbon::parse($datetime)->format('d-m-Y');
    }
}

function getDateFormatLDFYHIS($datetime)
{
    if (isset($datetime)) {
        return Carbon::parse($datetime)->translatedFormat('l, d F Y H:i:s');
    }
}

function year()
{
    return Carbon::now()->format('Y');
}

function getFormatClass($value)
{
    $class_join = StudentClass::join('classes','student_classes.stc_class_id','=','classes.cls_id')
    ->where('classes.cls_id', $value)->first();

    $class = Classes::join('majors','classes.cls_major_id','=','majors.mjr_id')
    ->join('grade_levels','classes.cls_grade_level_id','=','grade_levels.grl_id')
    ->where('classes.cls_id', $class_join->stc_class_id)->first();
    return $class->grl_name .' '. $class->mjr_name .' ' . $class->cls_number;
}