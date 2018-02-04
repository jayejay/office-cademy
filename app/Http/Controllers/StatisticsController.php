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

        $rightAnswersArray = [];
        $wrongAnswersArray = [];

        $questionsCount = count($quizAnswerStatistics);

        $y1 = 265;

        $xDelta = 551/$questionsCount;
        $positionXrightAnswer = 67;
        $positionXwrongAnswer = 77;

        foreach($quizAnswerStatistics as $quizAnswerStatistic){

            if ($quizAnswerStatistic->right_answer){
                $rightAnswersArray[$quizAnswerStatistic->question_id]['count'] = $quizAnswerStatistic->count;
                $rightAnswersArray[$quizAnswerStatistic->question_id]['position_x'] = $positionXrightAnswer;
                $rightAnswersArray[$quizAnswerStatistic->question_id]['position_y'] = $y1 - ($y1 / $questionsCount * $quizAnswerStatistic->count);

//                $wrongAnswersArray[$quizAnswerStatistic->question_id]['count'] = 0;
//                $wrongAnswersArray[$quizAnswerStatistic->question_id]['position_x'] = $positionXwrongAnswer;
//                $wrongAnswersArray[$quizAnswerStatistic->question_id]['position_y'] = $y1;

            } else {

                $wrongAnswersArray[$quizAnswerStatistic->question_id]['count'] = $quizAnswerStatistic->count;
                $wrongAnswersArray[$quizAnswerStatistic->question_id]['position_x'] = $positionXwrongAnswer;
                $wrongAnswersArray[$quizAnswerStatistic->question_id]['position_y'] = $y1 - ($y1 / $questionsCount * $quizAnswerStatistic->count);

//                $rightAnswersArray[$quizAnswerStatistic->question_id]['count'] = 0;
//                $rightAnswersArray[$quizAnswerStatistic->question_id]['position_x'] = $positionXrightAnswer;
//                $rightAnswersArray[$quizAnswerStatistic->question_id]['position_y'] = $y1;
            }
            $positionXrightAnswer += $xDelta;
            $positionXwrongAnswer += $xDelta;
        }



        return view('statistics.quiz_statistics', [
            'rightAnswersArray' => $rightAnswersArray,
            'wrongAnswersArray' => $wrongAnswersArray,
            'questionsCount' => $questionsCount,
        ]);
    }
}
