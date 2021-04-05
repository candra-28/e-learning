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

        DB::table('teachers')->insert([
            'tcr_user_id' => 3,
            'tcr_nip'    => "0332902382375",
            'tcr_entry_year' => "2021",
            'tcr_is_active' => 1,
        ]);

        DB::table('teachers')->insert([
            'tcr_user_id' => 4,
            'tcr_nip'    => "0332902382376",
            'tcr_entry_year' => "2021",
            'tcr_is_active' => 1,
        ]);

        DB::table('teachers')->insert([
            'tcr_user_id' => 5,
            'tcr_nip'    => "0332902382377",
            'tcr_entry_year' => "2021",
            'tcr_is_active' => 1,
        ]);
    }
}
