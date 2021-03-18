<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradeLevel extends Model
{
    protected $primaryKey = 'grl_id';
    protected $table = 'grade_levels';
    const CREATED_AT = 'grl_created_at';
    const UPDATED_AT = 'grl_updated_at';
    const DELETED_AT = 'grl_deleted_at';
    protected $guarded = [];
}
