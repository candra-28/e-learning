<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
use App\Models\Student;
use App\Models\StudentClass;

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

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_has_roles', 'uhs_user_id', 'uhs_role_id');
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'stu_user_id', 'usr_id');
    }

    public static function getRoles()
    {
        $user = User::join('user_has_roles', 'user_has_roles.uhs_user_id', '=', 'users.usr_id')
            ->join('roles', 'user_has_roles.uhs_role_id', '=', 'roles.rol_id')
            ->select('rol_name')
            ->where('usr_id', Auth()->user()->usr_id)->first();

        return $user;
    }
}
