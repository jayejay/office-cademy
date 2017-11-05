<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{

    protected $courseArray = ["Excel Beginner", "Excel Advanced"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->courseArray as $course){
            DB::table('courses')->insert([
                'course' => $course,
                'category_id' => 1
            ]);
        }

    }
}