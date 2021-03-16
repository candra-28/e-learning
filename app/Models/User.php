<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\UserHasRole;
use App\Models\Role;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'usr_id';
    const CREATED_AT = 'usr_created_at';
    const UPDATED_AT = 'usr_updated_at';
    const DELETED_AT = 'usr_deleted_at';
    protected $guarded = [];

    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    public function getAuthPassword()
    {
        return $this->usr_password;
    }

    protected $hidden = [
        'usr_password', 'usr_remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'usr_otp_verified_at' => 'datetime',
    ];
    protected $dates = ['usr_date_of_birth'];

    public function getRememberToken()
    {
        return $this->usr_remember_token;
    }

    public function setRememberToken($value)
    {
        $this->usr_remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'usr_remember_token';
    }

    // public function user_has_roles()
    // {
    //     return $this->hasMany(UserHasRole::class, 'uhs_user_id', 'usr_id',);
    // }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_has_roles', 'uhs_user_id', 'uhs_role_id');
    }
}