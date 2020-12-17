<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Announcement;
use Faker\Factory as Faker;
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

		Role::create([
			'name' => 'Administrator'
		]);

		Role::create([
			'name' => 'Guru'
		]);

		Role::create([
			'name' => 'Siswa'
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

		// $faker = Faker::create('id_ID');

		// for ($i = 1; $i <= 1000000; $i++) {

		// 	DB::table('roles')->insert([
		// 		'name' => $faker->name,
		// 	]);
		// }

	}
}
