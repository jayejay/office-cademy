<?php
/**
 * @var $post App\Post;
 */
?>
@extends('layouts.admin_layout')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">insert_chart</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">@lang('custom.Quiz Statistics')
                    </h4>
                </div>
                <div id="multipleBarsChart" class="ct-chart">
                    <svg xmlns:ct="https://github.com/gionkunz/chartist-js" width="100%" height="300px"
                         class="ct-chart-bar" style="width: 100%; height: 300px;">
                        {{--Vertical lines--}}
                        <g class="ct-grids">
                            <line y1="265" y2="265" x1="50" x2="578" class="ct-grid ct-vertical"></line>
                            <line y1="237.22222222222223" y2="237.22222222222223" x1="50" x2="578"
                                  class="ct-grid ct-vertical"></line>
                            <line y1="209.44444444444446" y2="209.44444444444446" x1="50" x2="578"
                                  class="ct-grid ct-vertical"></line>
                            <line y1="181.66666666666669" y2="181.66666666666669" x1="50" x2="578"
                                  class="ct-grid ct-vertical"></line>
                            <line y1="153.88888888888889" y2="153.88888888888889" x1="50" x2="578"
                                  class="ct-grid ct-vertical"></line>
                            <line y1="126.11111111111111" y2="126.11111111111111" x1="50" x2="578"
                                  class="ct-grid ct-vertical"></line>
                            <line y1="98.33333333333334" y2="98.33333333333334" x1="50" x2="578"
                                  class="ct-grid ct-vertical"></line>
                            <line y1="70.55555555555554" y2="70.55555555555554" x1="50" x2="578"
                                  class="ct-grid ct-vertical"></line>
                            <line y1="42.77777777777777" y2="42.77777777777777" x1="50" x2="578"
                                  class="ct-grid ct-vertical"></line>
                            <line y1="15" y2="15" x1="50" x2="578" class="ct-grid ct-vertical"></line>
                        </g>
                        {{--blue lines--}}
                            {{--<g class="ct-series ct-series-a">--}}
                                {{--<line x1="67" x2="67" y1="265" y2="114.44444444444446" class="ct-bar" ct:value="542"--}}
                                      {{--opacity="1"></line>--}}
                                {{--<line x1="111" x2="111" y1="265" y2="141.94444444444446" class="ct-bar" ct:value="443"--}}
                                      {{--opacity="1"></line>--}}
                                {{--<line x1="155" x2="155" y1="265" y2="176.11111111111111" class="ct-bar" ct:value="320"--}}
                                      {{--opacity="1"></line>--}}
                                {{--<line x1="199" x2="199" y1="265" y2="48.33333333333334" class="ct-bar" ct:value="780"--}}
                                      {{--opacity="1"></line>--}}
                                {{--<line x1="243" x2="243" y1="265" y2="111.38888888888889" class="ct-bar" ct:value="553"--}}
                                      {{--opacity="1"></line>--}}
                                {{--<line x1="287" x2="287" y1="265" y2="139.16666666666669" class="ct-bar" ct:value="453"--}}
                                      {{--opacity="1"></line>--}}
                                {{--<line x1="331" x2="331" y1="265" y2="174.44444444444446" class="ct-bar" ct:value="326"--}}
                                      {{--opacity="1"></line>--}}
                                {{--<line x1="375" x2="375" y1="265" y2="144.44444444444446" class="ct-bar" ct:value="434"--}}
                                      {{--opacity="1"></line>--}}
                                {{--<line x1="419" x2="419" y1="265" y2="107.22222222222223" class="ct-bar" ct:value="568"--}}
                                      {{--opacity="1"></line>--}}
                                {{--<line x1="463" x2="463" y1="265" y2="95.55555555555554" class="ct-bar" ct:value="610"--}}
                                      {{--opacity="1"></line>--}}
                                {{--<line x1="507" x2="507" y1="265" y2="55" class="ct-bar" ct:value="756"--}}
                                      {{--opacity="1"></line>--}}
                                {{--<line x1="551" x2="551" y1="265" y2="16.388888888888886" class="ct-bar" ct:value="895"--}}
                                      {{--opacity="1"></line>--}}
                            {{--</g>--}}
                         <g class="ct-series ct-series-a">
                                <?php
                                    $deltaX1 = 551/$questionsCount;
                                    $startX1 = 67;

                                    foreach($questionsAnswerArray as $questionAnswers){
                                        if (!array_key_exists(1, $questionAnswers)){
                                            echo "<line x1='$startX1' x2='$startX1' y1='265' y2='265' class='ct-bar'
                                                ct:value='0'></line>";
                                        } else {
                                           $y2 = 1 / $questionAnswers[1] * 265;
                                           echo "<line x1='$startX1' x2='$startX1' y1='265' y2='".$y2."' class='ct-bar'
                                                ct:value='0'></line>";
                                        }

                                        $startX1 += $deltaX1;
                                    }

                                ?>



                            </g>

                        <g class="ct-series ct-series-b">
                            <?php

                            $deltaX1 = 551/$questionsCount;
                            $startX1 = 77;
                            foreach($questionsAnswerArray as $questionAnswers){
                                if (!array_key_exists(0, $questionAnswers)){
                                    echo "<line x1='$startX1' x2='$startX1' y1='265' y2='265' class='ct-bar'
                                                ct:value='0'></line>";
                                } else {
                                    $y2 = 1 / $questionAnswers[0] * 265;
                                    echo "<line x1='$startX1' x2='$startX1' y1='265' y2='".$y2."' class='ct-bar'
                                                ct:value='0'></line>";
                                }

                                $startX1 += $deltaX1;
                            }

                            ?>

                        </g>
                            {{--red lines--}}
                            {{--<g class="ct-series ct-series-b">--}}
                                {{--<line x1="77" x2="77" y1="265" y2="150.55555555555554" class="ct-bar" ct:value="412"--}}
                                      {{--opacity="1"></line>--}}
                                {{--<line x1="121" x2="121" y1="265" y2="197.5" class="ct-bar" ct:value="243"--}}
                                      {{--opacity="1"></line>--}}
                                {{--<line x1="165" x2="165" y1="265" y2="187.22222222222223" class="ct-bar" ct:value="280"--}}
                                      {{--opacity="1"></line>--}}
                                {{--<line x1="209" x2="209" y1="265" y2="103.88888888888889" class="ct-bar" ct:value="580"--}}
                                      {{--opacity="1"></line>--}}
                                {{--<line x1="253" x2="253" y1="265" y2="139.16666666666669" class="ct-bar" ct:value="453"--}}
                                      {{--opacity="1"></line>--}}
                                {{--<line x1="297" x2="297" y1="265" y2="166.94444444444446" class="ct-bar" ct:value="353"--}}
                                      {{--opacity="1"></line>--}}
                                {{--<line x1="341" x2="341" y1="265" y2="181.66666666666669" class="ct-bar" ct:value="300"--}}
                                      {{--opacity="1"></line>--}}
                                {{--<line x1="385" x2="385" y1="265" y2="163.88888888888889" class="ct-bar" ct:value="364"--}}
                                      {{--opacity="1"></line>--}}
                                {{--<line x1="429" x2="429" y1="265" y2="162.77777777777777" class="ct-bar" ct:value="368"--}}
                                      {{--opacity="1"></line>--}}
                                {{--<line x1="473" x2="473" y1="265" y2="151.11111111111111" class="ct-bar" ct:value="410"--}}
                                      {{--opacity="1"></line>--}}
                                {{--<line x1="517" x2="517" y1="265" y2="88.33333333333334" class="ct-bar" ct:value="636"--}}
                                      {{--opacity="1"></line>--}}
                                {{--<line x1="561" x2="561" y1="265" y2="71.94444444444446" class="ct-bar" ct:value="695"--}}
                                      {{--opacity="1"></line>--}}
                            {{--</g>--}}
                        {{--</g>--}}
                        <g class="ct-labels">
                            <foreignObject style="overflow: visible;" x="50" y="270" width="44" height="20"><span
                                        class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/"
                                        style="width: 44px; height: 20px;">Jan</span></foreignObject>
                            <foreignObject style="overflow: visible;" x="94" y="270" width="44" height="20"><span
                                        class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/"
                                        style="width: 44px; height: 20px;">Feb</span></foreignObject>
                            <foreignObject style="overflow: visible;" x="138" y="270" width="44" height="20"><span
                                        class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/"
                                        style="width: 44px; height: 20px;">Mar</span></foreignObject>
                            <foreignObject style="overflow: visible;" x="182" y="270" width="44" height="20"><span
                                        class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/"
                                        style="width: 44px; height: 20px;">Apr</span></foreignObject>
                            <foreignObject style="overflow: visible;" x="226" y="270" width="44" height="20"><span
                                        class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/"
                                        style="width: 44px; height: 20px;">Mai</span></foreignObject>
                            <foreignObject style="overflow: visible;" x="270" y="270" width="44" height="20"><span
                                        class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/"
                                        style="width: 44px; height: 20px;">Jun</span></foreignObject>
                            <foreignObject style="overflow: visible;" x="314" y="270" width="44" height="20"><span
                                        class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/"
                                        style="width: 44px; height: 20px;">Jul</span></foreignObject>
                            <foreignObject style="overflow: visible;" x="358" y="270" width="44" height="20"><span
                                        class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/"
                                        style="width: 44px; height: 20px;">Aug</span></foreignObject>
                            <foreignObject style="overflow: visible;" x="402" y="270" width="44" height="20"><span
                                        class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/"
                                        style="width: 44px; height: 20px;">Sep</span></foreignObject>
                            <foreignObject style="overflow: visible;" x="446" y="270" width="44" height="20"><span
                                        class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/"
                                        style="width: 44px; height: 20px;">Oct</span></foreignObject>
                            <foreignObject style="overflow: visible;" x="490" y="270" width="44" height="20"><span
                                        class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/"
                                        style="width: 44px; height: 20px;">Nov</span></foreignObject>
                            <foreignObject style="overflow: visible;" x="534" y="270" width="44" height="20"><span
                                        class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/"
                                        style="width: 44px; height: 20px;">Dec</span></foreignObject>
                            <foreignObject style="overflow: visible;" y="237.22222222222223" x="10"
                                           height="27.77777777777778" width="30"><span
                                        class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/"
                                        style="height: 28px; width: 30px;">0</span></foreignObject>
                            <foreignObject style="overflow: visible;" y="209.44444444444446" x="10"
                                           height="27.77777777777778" width="30"><span
                                        class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/"
                                        style="height: 28px; width: 30px;">100</span></foreignObject>
                            <foreignObject style="overflow: visible;" y="181.66666666666669" x="10"
                                           height="27.77777777777777" width="30"><span
                                        class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/"
                                        style="height: 28px; width: 30px;">200</span></foreignObject>
                            <foreignObject style="overflow: visible;" y="153.8888888888889" x="10"
                                           height="27.777777777777786" width="30"><span
                                        class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/"
                                        style="height: 28px; width: 30px;">300</span></foreignObject>
                            <foreignObject style="overflow: visible;" y="126.11111111111111" x="10"
                                           height="27.77777777777777" width="30"><span
                                        class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/"
                                        style="height: 28px; width: 30px;">400</span></foreignObject>
                            <foreignObject style="overflow: visible;" y="98.33333333333334" x="10"
                                           height="27.77777777777777" width="30"><span
                                        class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/"
                                        style="height: 28px; width: 30px;">500</span></foreignObject>
                            <foreignObject style="overflow: visible;" y="70.55555555555554" x="10"
                                           height="27.7777777777778" width="30"><span
                                        class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/"
                                        style="height: 28px; width: 30px;">600</span></foreignObject>
                            <foreignObject style="overflow: visible;" y="42.77777777777777" x="10"
                                           height="27.77777777777777" width="30"><span
                                        class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/"
                                        style="height: 28px; width: 30px;">700</span></foreignObject>
                            <foreignObject style="overflow: visible;" y="15" x="10" height="27.77777777777777"
                                           width="30"><span class="ct-label ct-vertical ct-start"
                                                            xmlns="http://www.w3.org/2000/xmlns/"
                                                            style="height: 28px; width: 30px;">800</span>
                            </foreignObject>
                            <foreignObject style="overflow: visible;" y="-15" x="10" height="30" width="30"><span
                                        class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/"
                                        style="height: 30px; width: 30px;">900</span></foreignObject>
                        </g>
                    </svg>
                </div>
            </div>
        </div>
        <div class="col-md-6"></div>
    </div>
@endsection



