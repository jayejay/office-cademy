<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'course' => 'Excel Beginner',
            'category_id' => 1
        ]);

        DB::table('courses')->insert([
            'course' => 'Excel Advanced',
            'category_id' => 1
        ]);

    }
}