<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
    protected $primaryKey = 'usn_id';
    const CREATED_AT = 'usn_created_at';
    const UPDATED_AT = 'usn_updated_at';
    const DELETED_AT = 'usn_deleted_at';
    protected $guarded = [];
}
