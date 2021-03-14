<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    protected $primaryKey = 'rol_id';
    const CREATED_AT = 'rol_created_at';
    const UPDATED_AT = 'rol_updated_at';
    const DELETED_AT = 'rol_deleted_at';
    protected $guarded = [];

    public function users()
    {
    	return $this->belongsToMany(User::class);
    }
}
