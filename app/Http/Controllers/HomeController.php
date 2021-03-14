<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Teacher;
use App\Clas;
use App\User;
use App\Models\UserHasRole;



class HomeController extends Controller
{
    public function index()
    {
    	// $student = Student::count();
    	// $teacher = Teacher::count();
    	// $class 	 = Clas::count();
  //   	$userku = User::find(Auth()->user()->usr_id)->user_has_roles;
  //   	foreach ($userku as $user) {
		//     // dd($user);
		// }
		// $userme = UserHasRole::find(1)->users;
		// dd($userku, $user, $userme);

		// $user = UserHasRole::join('users','user_has_roles.uhs_user_id','=','users.usr_id')
  //             ->join('roles','user_has_roles.uhs_role_id','=','roles.rol_id')
  //             ->where('uhs_user_id',Auth()->user()->usr_id)->first();

              // dd($user->rol_name);
              // dd($user);








  //   	$users = User::with('roles')->get();
  //   	foreach ($users->flatMap->roles as $role) {
		//     dd($users->flatMap->roles);
		// }

  //   	dd($users);
        return view('index');
    }
}
