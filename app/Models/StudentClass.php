<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Classes;

class StudentClass extends Model
{
    protected $primaryKey = 'stc_id';
    protected $table = 'student_classes';
    const CREATED_AT = 'stc_created_at';
    const UPDATED_AT = 'stc_updated_at';
    const DELETED_AT = 'stc_deleted_at';
    protected $guarded = [];

    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'stc_class_id');
    }
}
