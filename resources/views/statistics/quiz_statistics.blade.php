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
                        {{--Grid Horizontal lines--}}
                        <g class="ct-grids">
                            @for($i = 1; $i <= $maxAnswerCount + 1; $i++)
                                <line y1="{{$gridYPositions[$i]}}" y2="{{$gridYPositions[$i]}}" x1="50" x2="578" class="ct-grid ct-vertical"></line>
                            @endfor
                        </g>
                        {{--blue lines--}}
                         <g class="ct-series ct-series-a">
                            @foreach($rightAnswersArray as $rightAnswer)
                                 <line x1="{{$rightAnswer['position_x']}}" x2="{{$rightAnswer['position_x']}}"
                                       y1="265" y2="{{$rightAnswer['position_y']}}" class="ct-bar"
                                       ct:value="{{$rightAnswer['count']}}"></line>
                            @endforeach
                        </g>

                        {{--red lines--}}
                        <g class="ct-series ct-series-b">
                            @foreach($wrongAnswersArray as $wrongAnswer)
                                <line x1="{{$wrongAnswer['position_x']}}" x2="{{$wrongAnswer['position_x']}}"
                                      y1="265" y2="{{$wrongAnswer['position_y']}}" class="ct-bar"
                                      ct:value="{{$wrongAnswer['count']}}"></line>
                            @endforeach
                        </g>

                        <g class="ct-labels">
                            {{--Horizontal labels--}}
                            @for($i = 1; $i < $questionsTotalCount + 1; $i++)
                                <foreignObject style="overflow: visible;"
                                               x="{{$i == 1 ? 50 : 50 + ($i - 1) * $xDelta}}"
                                               y="270" width="44" height="20">
                                    <span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/"
                                          style="width: 44px; height: 20px;">
                                        Q{{$questionIdArray[$i-1]}}
                                    </span>
                                </foreignObject>
                            @endfor

                            {{--Vertical labels--}}
                            @for($i = 1; $i <= $maxAnswerCount + 1; $i++)
                                <foreignObject style="overflow: visible;" y="{{$gridYPositions[$i]-22}}" x="10" height="27.77777777777778"
                                               width="30">
                                    <span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/"
                                            style="height: 28px; width: 30px;">
                                        {{$i-1}}
                                    </span>
                                </foreignObject>
                            @endfor

                        </g>
                    </svg>
                </div>
            </div>
        </div>
        <div class="col-md-6"></div>
    </div>
@endsection



