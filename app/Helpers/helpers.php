<?php

use Illuminate\Support\Carbon;
use App\Models\User;

function getDateFormat($datetime)
{
    if (isset($datetime)) {
        return Carbon::parse($datetime)->translatedFormat('l, d F Y');
    }
}

function getDateBirthday($datetime)
{
    if (isset($datetime)) {
        return Carbon::parse($datetime)->format('d-m-Y');
    }
}

function getDateFormatLDFYHIS($datetime)
{
    if (isset($datetime)) {
        return Carbon::parse($datetime)->translatedFormat('l, d F Y H:i:s');
    }
}

function roles()
{
    $user = User::join('user_has_roles', 'user_has_roles.uhs_user_id', '=', 'users.usr_id')
        ->join('roles', 'user_has_roles.uhs_role_id', '=', 'roles.rol_id')
        ->select('usr_id', 'usr_name', 'rol_id', 'rol_name', 'uhs_id', 'uhs_role_id', 'uhs_user_id');
    return $user;
}
