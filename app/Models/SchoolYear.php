<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    protected $primaryKey = 'scy_id';
    const CREATED_AT = 'scy_created_at';
    const UPDATED_AT = 'scy_updated_at';
    const DELETED_AT = 'scy_deleted_at';
}
