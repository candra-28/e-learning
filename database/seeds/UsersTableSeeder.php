<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		DB::table('class')->insert([
			'name' => 'Administrator',
		]);

		DB::table('class')->insert([
			'name' => 'Guru',
		]);

		DB::table('class')->insert([
			'name' => 'Siswa',
		]);

		User::create([
			'name' => 'candra',
			'email' => 'candra@gmail.com',
			'password' => Hash::make('123'),
			'role_id' => 1,
			'is_active' => 1,
			'entry_year' => 2020
		]);

		User::create([
			'name' => 'ahmad',
			'email' => 'ahmad@gmail.com',
			'password' => Hash::make('abc'),
			'role_id' => 2,
			'is_active' => 1,
			'entry_year' => 2020
		]);
	}
}
