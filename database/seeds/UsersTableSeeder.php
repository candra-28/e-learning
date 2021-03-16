<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\UserHasRole;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
	public function run()
	{
		User::create([
			'usr_name' => 'candra',
			'usr_email' => 'candra@gmail.com',
			'usr_password' => Hash::make('123'),
			'usr_phone_number'	=> '082118342147',
			'usr_otp_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'usr_is_active' => 1,
		]);

		User::create([
			'usr_name' => 'ahmad',
			'usr_email' => 'ahmad@gmail.com',
			'usr_password' => Hash::make('abc'),
			'usr_phone_number'	=> '082118342147',
			'usr_otp_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'usr_is_active' => 1,
		]);

		UserHasRole::create([
			'uhs_user_id'	=> 1,
			'uhs_role_id'	=> 1,
		]);

		UserHasRole::create([
			'uhs_user_id'	=> 2,
			'uhs_role_id'	=> 3,
		]);
		

	}
}
