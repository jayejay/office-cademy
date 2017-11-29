<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{

//    protected $courseArray = ["Excel Beginner", "Excel Advanced"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Course::class, 1)->create();

//        foreach($this->courseArray as $course){
//            DB::table('courses')->insert([
//                'name:de' => 'de: '. $course,
//                'name:en' => 'en: '. $course,
//                'category_id' => 1
//            ]);
//        }
    }
}