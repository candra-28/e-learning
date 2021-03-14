<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(GradeLevelsTableSeeder::class);
        $this->call(MajorsTableSeeder::class);
        $this->call(SchoolYearsTableSeeder::class);
        
        $this->call(ClassesTableSeeder::class);
    }
}
