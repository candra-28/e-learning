<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $primaryKey = 'mjr_id';
    const CREATED_AT = 'mjr_created_at';
    const UPDATED_AT = 'mjr_updated_at';
    const DELETED_AT = 'mjr_deleted_at';
    protected $guarded = [];
}
