<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function showQuizStatistics()
    {

        $quizAnswerStatistics = DB::table('quiz_answer_statistics')
            ->select(DB::raw('question_id, right_answer, COUNT(question_id)'))
            ->groupBy('question_id', 'right_answer')
            ->orderBy('question_id')->get()->toArray();

        $joinedResults = [];
        $maxAnswerCount = 0;
        $questionsCount = [];

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

        foreach ($joinedResults as $question_id => $joinedResult) {

            if (isset($joinedResult['right_answers_count'])) {
                $rightAnswersArray[$question_id]['count'] = $joinedResult['right_answers_count'];
                $rightAnswersArray[$question_id]['position_x'] = $positionXrightAnswer;
                $rightAnswersArray[$question_id]['position_y'] = $y1 -
                    ($y1 / $maxAnswerCount * $joinedResult['right_answers_count']);
            }
            if (isset($joinedResult['wrong_answers_count'])) {
                $wrongAnswersArray[$question_id]['count'] = $joinedResult['wrong_answers_count'];
                $wrongAnswersArray[$question_id]['position_x'] = $positionXwrongAnswer;
                $wrongAnswersArray[$question_id]['position_y'] = $y1 -
                    ($y1 / $maxAnswerCount * $joinedResult['wrong_answers_count']);
            }
            $positionXrightAnswer += $xDelta;
            $positionXwrongAnswer += $xDelta;
        }

        /*Grid calculation*/
        $gridStart = 265;
        $gridDelta = $gridStart / $maxAnswerCount + 1;

        $gridYPositions = [];
        $sub = 0;

        for ($i = 1; $i <= $questionsTotalCount; $i++) {
            $gridYPositions[$i] = $gridStart - $sub;

            $sub += $gridDelta;
        }

        $horizontalLabelData = [];
        $horizontalLabelXPosition = $horizontalLabelXStart;

        for ($i = 1; $i <= $questionsTotalCount; $i++){
            $horizontalLabelData[$i]['position_x'] = $horizontalLabelXPosition;
            $horizontalLabelData[$i]['question_number'] = $questionsCount[$i];

            $horizontalLabelXPosition += $xDelta;
        }


        return view('statistics.quiz_statistics', [
            'rightAnswersArray' => $rightAnswersArray,
            'wrongAnswersArray' => $wrongAnswersArray,
            'gridYPositions' => $gridYPositions,
            'questionsTotalCount' => $questionsTotalCount,
            'maxAnswerCount' => $maxAnswerCount
        ]);
    }
}
