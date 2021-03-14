<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
			'rol_name' => 'Administrator',
			'rol_is_active'	=> 1,
		]);

		DB::table('roles')->insert([
			'rol_name' => 'Guru',
			'rol_is_active'	=> 1,
		]);

		DB::table('roles')->insert([
			'rol_name' => 'Siswa',
			'rol_is_active'	=> 1,
		]);
    }
}
