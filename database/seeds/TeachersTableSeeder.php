<?php

use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            'tcr_user_id' => 2,
            'tcr_nip'    => "0332902382374",
            'tcr_entry_year' => "2021",
            'tcr_is_active' => 1,
        ]);
    }
}
