<?php

use Illuminate\Database\Seeder;

class MajorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('majors')->insert([
            'mjr_name' => 'Multimedia',
            'mjr_is_active'    => 1,
            'mjr_description' => 'Multimedia adalah jurusan desaign',
            'mjr_thumnail'  => 'vendor/be/assets/images/majors/mm.jpeg',
        ]);

        DB::table('majors')->insert([
            'mjr_name' => 'Rekayasa Perangkat Lunak',
            'mjr_is_active'    => 1,
            'mjr_description'   => 'Rekayasa Perangkat Lunak adalah jurusan dengan semua logika dan coding',
            'mjr_thumnail'  => 'vendor/be/assets/images/majors/rpl.jpeg',
        ]);
    }
}
