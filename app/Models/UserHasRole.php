<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHasRole extends Model
{
    protected $primaryKey = 'uhs_id';
    const CREATED_AT = 'uhs_created_at';
    const UPDATED_AT = 'uhs_updated_at';
    const DELETED_AT = 'uhs_deleted_at';
}
