<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ClassesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('classes')->insert([
			'cls_grade_level_id' => 1,
			'cls_school_year_id' => 1,
			'cls_major_id'	=> 1,
			// 'cls_number'	=> '',
			'cls_is_active'	=> 1,
			'cls_homeroom_teacher_id' => 1
		]);

		DB::table('classes')->insert([
			'cls_grade_level_id' => 1,
			'cls_school_year_id' => 1,
			'cls_major_id'	=> 2,
			// 'cls_number'	=> 1,
			'cls_is_active'	=> 1,
			'cls_homeroom_teacher_id' => 1
		]);

		DB::table('classes')->insert([
			'cls_grade_level_id' => 1,
			'cls_school_year_id' => 2,
			'cls_major_id'	=> 1,
			// 'cls_number'	=> 2,
			'cls_is_active'	=> 1,
			'cls_homeroom_teacher_id' => 1
		]);

		DB::table('classes')->insert([
			'cls_grade_level_id' => 1,
			'cls_school_year_id' => 2,
			'cls_major_id'	=> 1,
			'cls_number'	=> 1,
			'cls_is_active'	=> 1,
			'cls_homeroom_teacher_id' => 1
		]);

		DB::table('classes')->insert([
			'cls_grade_level_id' => 1,
			'cls_school_year_id' => 2,
			'cls_major_id'	=> 1,
			'cls_number'	=> 2,
			'cls_is_active'	=> 1,
			'cls_homeroom_teacher_id' => 1
		]);

		DB::table('classes')->insert([
			'cls_grade_level_id' => 1,
			'cls_school_year_id' => 3,
			'cls_major_id'	=> 1,
			// 'cls_number'	=> 2,
			'cls_is_active'	=> 1,
			'cls_homeroom_teacher_id' => 1
		]);

		DB::table('classes')->insert([
			'cls_grade_level_id' => 1,
			'cls_school_year_id' => 3,
			'cls_major_id'	=> 2,
			'cls_number'	=> 1,
			'cls_is_active'	=> 1,
			'cls_homeroom_teacher_id' => 1
		]);

		DB::table('classes')->insert([
			'cls_grade_level_id' => 1,
			'cls_school_year_id' => 3,
			'cls_major_id'	=> 2,
			'cls_number'	=> 2,
			'cls_is_active'	=> 1,
			'cls_homeroom_teacher_id' => 1
		]);
		
		// for ($i = 0; $i < 1000; $i++) {
		// 	DB::table('classes')->insert([
		// 		'cls_grade_level_id' => 1,
		// 		'cls_school_year_id' => 5,
		// 		'cls_major_id'	=> 2,
		// 		'cls_number'	=> 2,
		// 		'cls_is_active'	=> 1
		// 	]);
		// }
	}
}
