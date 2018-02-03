<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function showQuizStatistics(){

        $quizAnswerStatistics = DB::table('quiz_answer_statistics')
            ->select(DB::raw('question_id, right_answer, COUNT(question_id)'))
            ->groupBy('question_id', 'right_answer')
            ->orderBy('question_id')->get()->toArray();

        $questionsAnswerArray = [];

        foreach($quizAnswerStatistics as $quizAnswerStatistic){
            $questionsAnswerArray[$quizAnswerStatistic->question_id][$quizAnswerStatistic->right_answer] =
                $quizAnswerStatistic->count;
        }

        $questionsCount = count($questionsAnswerArray);


        return view('statistics.quiz_statistics', [
            'questionsAnswerArray' => $questionsAnswerArray,
            'questionsCount' => $questionsCount
        ]);
    }
}
