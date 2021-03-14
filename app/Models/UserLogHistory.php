<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLogHistory extends Model
{
    protected $primaryKey = 'ulh_id';
    const CREATED_AT = 'ulh_created_at';
    const UPDATED_AT = 'ulh_updated_at';
    const DELETED_AT = 'ulh_deleted_at';
    protected $guarded = [];
}
