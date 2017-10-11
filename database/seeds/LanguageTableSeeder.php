<?php

use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            'language' => 'english',
            'language_short' => 'en'
        ]);

        DB::table('languages')->insert([
            'language' => 'deutsch',
            'language_short' => 'de'
        ]);

    }
}