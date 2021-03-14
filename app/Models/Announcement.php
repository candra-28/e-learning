<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $primaryKey = 'acm_id';
    const CREATED_AT = 'acm_created_at';
    const UPDATED_AT = 'acm_updated_at';
    const DELETED_AT = 'acm_deleted_at';
    protected $guarded = [];
}
