<?php

namespace App\Http\Controllers;

use App\MultipleBarChart;
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
        
        $totalBarCount = count($questionsCount);

        $multipleBarChart = new MultipleBarChart(67, 77, 
            551, 265, $totalBarCount);
                
        $horizontalStartPositionFirstBar = $multipleBarChart->getHorizontalStartPositionFirstBar();
        $horizontalStartPositionSecondBar = $multipleBarChart->getHorizontalStartPositionSecondBar();
        $horizontalLabelStart = $multipleBarChart->getHorizontalLabelStart();
        $horizontalDelta = $multipleBarChart->getHorizontalDelta();
        $yStartPosition = $multipleBarChart->getVerticalStartPosition();
        

        $rightAnswersArray = [];
        $wrongAnswersArray = [];
        
        foreach ($joinedResults as $question_id => $joinedResult) {

            if (isset($joinedResult['right_answers_count'])) {
                $rightAnswersArray[$question_id]['count'] = $joinedResult['right_answers_count'];
                $rightAnswersArray[$question_id]['position_x'] = $horizontalStartPositionFirstBar;
                $rightAnswersArray[$question_id]['position_y'] = $yStartPosition -
                    ($yStartPosition / $maxAnswerCount * $joinedResult['right_answers_count']);
            }
            if (isset($joinedResult['wrong_answers_count'])) {
                $wrongAnswersArray[$question_id]['count'] = $joinedResult['wrong_answers_count'];
                $wrongAnswersArray[$question_id]['position_x'] = $horizontalStartPositionSecondBar;
                $wrongAnswersArray[$question_id]['position_y'] = $yStartPosition -
                    ($yStartPosition / $maxAnswerCount * $joinedResult['wrong_answers_count']);
            }
            $horizontalStartPositionFirstBar += $horizontalDelta;
            $horizontalStartPositionSecondBar += $horizontalDelta;
        }

        $gridVerticalPositions = $multipleBarChart->getGridVerticalPositions();

        $horizontalLabelData = [];
        $horizontalLabelXPosition = $horizontalLabelStart;

        for ($i = 1; $i <= $totalBarCount; $i++){
            $horizontalLabelData[$i]['position_x'] = $horizontalLabelXPosition;
            $horizontalLabelData[$i]['question_number'] = $questionsCount[$i];

            $horizontalLabelXPosition += $horizontalDelta;
        }

        return view('statistics.quiz_statistics', [
            'rightAnswersArray' => $rightAnswersArray,
            'wrongAnswersArray' => $wrongAnswersArray,
            'gridYPositions' => $gridVerticalPositions,
            'questionsTotalCount' => $totalBarCount,
            'maxAnswerCount' => $maxAnswerCount
        ]);
    }
}
