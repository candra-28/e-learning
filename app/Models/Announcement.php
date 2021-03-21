<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\user;

class Announcement extends Model
{
    protected $primaryKey = 'acm_id';
    const CREATED_AT = 'acm_created_at';
    const UPDATED_AT = 'acm_updated_at';
    const DELETED_AT = 'acm_deleted_at';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'acm_user_id');
    }
}
