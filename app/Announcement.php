<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = ['user_id', 'title', 'slug', 'description', 'upload_type', 'created_at', 'updated_at'];
}
