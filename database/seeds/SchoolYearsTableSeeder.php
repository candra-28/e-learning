<?php

use Illuminate\Database\Seeder;

class SchoolYearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school_years')->insert([
			'scy_name' => '2016/2017',
			'scy_is_active'	=> 1,
		]);

		DB::table('school_years')->insert([
			'scy_name' => '2017/2018',
			'scy_is_active'	=> 1,
		]);

		DB::table('school_years')->insert([
			'scy_name' => '2018/2019',
			'scy_is_active'	=> 1,
		]);
		DB::table('school_years')->insert([
			'scy_name' => '2019/2020',
			'scy_is_active'	=> 1,
		]);
		DB::table('school_years')->insert([
			'scy_name' => '2020/2021',
			'scy_is_active'	=> 1,
		]);
    }
}
