<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Question::factory()->count(15)->create()->each(function($question){
            \App\Models\Answer::factory()->count(rand(2,4))->create([
                'question_id' => $question->id
            ]);
        }); 
    }
}
