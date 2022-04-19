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
         $this->call(userTableSeeder::class);
        $this->call(GradeTableSeeder::class);
        $this->call(classroomTableSeeder::class);
        $this->call(sectionsTableSeeder::class);
        $this->call(BloodTableSeeder::class);
        $this->call(NationalitiesTableSeeder::class);
        $this->call(religionTableSeeder::class);
        $this->call(specializationTableSeeder::class);
        $this->call(GenderTableSeedr::class);
        $this->call(ParentsTableSeeder::class);
        $this->call(studentsTableSeeder::class);
    }
}
