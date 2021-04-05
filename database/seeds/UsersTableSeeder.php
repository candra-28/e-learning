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
			'usr_name' => 'Ahmad',
			'usr_email' => 'ahmad@gmail.com',
			'usr_password' => Hash::make('123'),
			'usr_phone_number'	=> '082118342147',
			'usr_otp_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'usr_is_active' => 1,
		]);

		User::create([
			'usr_name' => 'Candra',
			'usr_email' => 'candra@gmail.com',
			'usr_password' => Hash::make('abc'),
			'usr_phone_number'	=> '082118342147',
			'usr_otp_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'usr_is_active' => 1,
		]);

		User::create([
			'usr_name' => 'Guru 1',
			'usr_email' => 'guru1@gmail.com',
			'usr_password' => Hash::make('12345678'),
			'usr_phone_number'	=> '082118342147',
			'usr_otp_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'usr_is_active' => 1,
		]);

		User::create([
			'usr_name' => 'Guru 2',
			'usr_email' => 'guru2@gmail.com',
			'usr_password' => Hash::make('12345678'),
			'usr_phone_number'	=> '082118342147',
			'usr_otp_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'usr_is_active' => 1,
		]);

		User::create([
			'usr_name' => 'Guru 3',
			'usr_email' => 'guru3@gmail.com',
			'usr_password' => Hash::make('12345678'),
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
		
		UserHasRole::create([
			'uhs_user_id'	=> 3,
			'uhs_role_id'	=> 3,
		]);

		UserHasRole::create([
			'uhs_user_id'	=> 4,
			'uhs_role_id'	=> 3,
		]);

		UserHasRole::create([
			'uhs_user_id'	=> 5,
			'uhs_role_id'	=> 3,
		]);
	}
}
