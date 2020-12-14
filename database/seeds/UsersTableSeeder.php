<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;
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
        	'role_id' => 1
        ]);

        User::create([
        	'name' => 'ahmad',
        	'email' => 'ahmad@gmail.com',
        	'password' => Hash::make('abc'),
        	'role_id' => 2
        ]);
        
    }
}
