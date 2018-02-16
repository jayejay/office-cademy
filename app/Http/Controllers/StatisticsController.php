<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function showQuizStatistics()
    {

        $quizAnswerStatistics = DB::table('quiz_answer_statistics')
            ->select(DB::raw('question_id, SUM(right_answer::int) AS right_answer_count, 
                COUNT(question_id)- SUM(right_answer::int) AS wrong_answer_count'))
            ->groupBy('question_id')
            ->orderBy('question_id')->get()->toArray();

        $joinedResults = [];
        $maxAnswerCount = 0;
        $questionsCount = [];

        $questionIdArray = [];

        foreach ($quizAnswerStatistics as $quizAnswerStatistic) {

            if ($quizAnswerStatistic->right_answer) {
                $joinedResults[$quizAnswerStatistic->question_id]['right_answers_count'] = $quizAnswerStatistic->count;
            } else {
                $joinedResults[$quizAnswerStatistic->question_id]['wrong_answers_count'] = $quizAnswerStatistic->count;
            }

            if ($quizAnswerStatistic->count > $maxAnswerCount) {
                $maxAnswerCount = $quizAnswerStatistic->count;
            }

            if (!isset($questionsCount[$quizAnswerStatistic->question_id])) {
                $questionsCount[$quizAnswerStatistic->question_id] = $quizAnswerStatistic->question_id;
            }

        }

        /*Result calculation*/
        $rightAnswersArray = [];
        $wrongAnswersArray = [];
        $y1 = 265;

        $questionsTotalCount = count($questionsCount);

        $xDelta = 551 / $questionsTotalCount;
        $positionXrightAnswer = 67;
        $positionXwrongAnswer = 77;
        $horizontalLabelXStart = ($positionXrightAnswer + $positionXwrongAnswer) / 2;

        $horizontalLabelData = [];
        $horizontalLabelXPosition = $horizontalLabelXStart;

        foreach ($joinedResults as $questionId => $joinedResult) {

            if (isset($joinedResult['right_answers_count'])) {
                $rightAnswersArray[$questionId]['count'] = $joinedResult['right_answers_count'];
                $rightAnswersArray[$questionId]['position_x'] = $positionXrightAnswer;
                $rightAnswersArray[$questionId]['position_y'] = $y1 -
                    ($y1 / $maxAnswerCount * $joinedResult['right_answers_count']);
            }
            if (isset($joinedResult['wrong_answers_count'])) {
                $wrongAnswersArray[$questionId]['count'] = $joinedResult['wrong_answers_count'];
                $wrongAnswersArray[$questionId]['position_x'] = $positionXwrongAnswer;
                $wrongAnswersArray[$questionId]['position_y'] = $y1 -
                    ($y1 / $maxAnswerCount * $joinedResult['wrong_answers_count']);
            }
            $positionXrightAnswer += $xDelta;
            $positionXwrongAnswer += $xDelta;

            $horizontalLabelData[] = [
                'position_x'=> $horizontalLabelXPosition,
                'question_number' => $questionId
            ];

            $questionIdArray[] = $questionId;

            $horizontalLabelXPosition += $xDelta;
        }

        /*Grid calculation*/
        $gridStart = $y1;
        $gridDelta = $gridStart / $maxAnswerCount + 1;

        $gridYPositions = [];
        $sub = 0;

        for ($i = 1; $i <= $questionsTotalCount; $i++) {
            $gridYPositions[$i] = $gridStart - $sub;

            $sub += $gridDelta;
        }


        return view('statistics.quiz_statistics', [
            'questionIdArray' => $questionIdArray,
            'rightAnswersArray' => $rightAnswersArray,
            'wrongAnswersArray' => $wrongAnswersArray,
            'gridYPositions' => $gridYPositions,
            'questionsTotalCount' => $questionsTotalCount,
            'maxAnswerCount' => $maxAnswerCount,
            'xDelta' => $xDelta
        ]);
    }
}
