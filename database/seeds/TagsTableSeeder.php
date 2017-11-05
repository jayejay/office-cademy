<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    protected $tagsArray = ["Office", "Excel", "Beginner", "Advanced", "Professional"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(App\Tag::class, 5)->create();

        foreach($this->tagsArray as $tag){
            DB::table('tags')->insert([
                'tag' => $tag,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
