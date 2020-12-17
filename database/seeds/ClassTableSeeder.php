<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class')->insert([
            'name' => 'X RPL 1',
            'is_active' => 1
        ]);

        DB::table('class')->insert([
            'name' => 'X MM 1',
            'is_active' => 1
        ]);

        DB::table('class')->insert([
            'name' => 'X MM 2',
            'is_active' => 1
        ]);

        DB::table('class')->insert([
            'name' => 'XI RPL 1',
            'is_active' => 1
        ]);

        DB::table('class')->insert([
            'name' => 'XI MM 1',
            'is_active' => 1
        ]);

        DB::table('class')->insert([
            'name' => 'XI MM 2',
            'is_active' => 1
        ]);

        DB::table('class')->insert([
            'name' => 'XII RPL 1',
            'is_active' => 1
        ]);

        DB::table('class')->insert([
            'name' => 'XII MM 1',
            'is_active' => 1
        ]);

        DB::table('class')->insert([
            'name' => 'XII MM 2',
            'is_active' => 1
        ]);
    }
}
