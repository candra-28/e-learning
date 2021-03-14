<?php

use Illuminate\Database\Seeder;

class GradeLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grade_levels')->insert([
			'grl_name' => 'X',
			'grl_is_active'	=> 1,
		]);

        DB::table('grade_levels')->insert([
			'grl_name' => 'XI',
			'grl_is_active'	=> 1,
		]);

		DB::table('grade_levels')->insert([
			'grl_name' => 'XII',
			'grl_is_active'	=> 1,
		]);

    }
}
